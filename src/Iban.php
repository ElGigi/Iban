<?php
/*
 * @license   https://opensource.org/licenses/MIT MIT License
 * @copyright 2022 Ronan GIRON
 * @author    Ronan GIRON <https://github.com/ElGigi>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code, to the root.
 */

declare(strict_types=1);

namespace ElGigi\Iban;

use ElGigi\Iban\Validation\Checksum;
use ElGigi\Iban\Validation\IbanValidation;
use InvalidArgumentException;
use JsonSerializable;
use Stringable;
use Throwable;

class Iban implements Stringable, JsonSerializable
{
    use CloneableTrait;

    public readonly int $checkDigits;

    public function __construct(
        public readonly Bban $bban,
        ?int $checkDigits = null,
    ) {
        $this->bban->country ?? throw new InvalidArgumentException('Country missing in BBAN');
        $this->checkDigits = $checkDigits ?? static::guessCheckDigits($this);
    }

    /**
     * Parse IBAN.
     *
     * @param string $iban
     *
     * @return static
     */
    public static function parse(string $iban): static
    {
        $iban = strtoupper($iban);
        $iban = preg_replace('/\s/', '', $iban);

        if (1 !== preg_match('/^([a-z]{2})([0-9]{2})([0-9a-z]{10,30})$/i', $iban, $matches, PREG_UNMATCHED_AS_NULL)) {
            throw new InvalidArgumentException(sprintf('"%s" is not a valid IBAN', $iban));
        }
        $country = constant(Country::class . '::' . $matches[1]);

        return new static(
            bban: Bban::parse($matches[3], $country),
            checkDigits: (int)$matches[2],
        );
    }

    /**
     * Try to parse IBAN.
     *
     * @param string|null $iban
     *
     * @return static|null
     */
    public static function tryParse(string|null $iban): ?static
    {
        if (null === $iban) {
            return null;
        }

        try {
            return static::parse($iban);
        } catch (Throwable) {
            return null;
        }
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->format();
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): string
    {
        return (string)$this;
    }

    /**
     * Format BBAN.
     *
     * @param bool $condensed
     *
     * @return string
     */
    public function format(bool $condensed = false): string
    {
        return
            implode(
                $condensed ? '' : ' ',
                str_split(
                    sprintf('%02s', $this->bban->country?->name ?? '') .
                    sprintf('%02d', $this->checkDigits ?? 0) .
                    $this->bban->format(true),
                    4
                )
            );
    }

    /**
     * Get country.
     *
     * @return Country
     */
    public function getCountry(): Country
    {
        return $this->bban->country;
    }

    /**
     * Is valid IBAN?
     *
     * @return bool
     */
    public function isValid(): bool
    {
        return IbanValidation::validate($this);
    }

    /**
     * Guess check digits.
     *
     * @param Iban|string $iban
     *
     * @return int
     */
    public static function guessCheckDigits(Iban|string $iban): int
    {
        is_string($iban) && $iban = static::parse($iban);
        $iban->bban->country ?? throw new InvalidArgumentException('Country missing in BBAN');

        $ibanStr = strtoupper(
            $iban->bban->format(true) .
            $iban->bban->country->name . '00'
        );

        return 98 - Checksum::modulo(Checksum::numericConversion($ibanStr), 97);
    }
}