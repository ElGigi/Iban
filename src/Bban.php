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

use ElGigi\Iban\Validation\BbanValidation;
use JsonSerializable;
use RuntimeException;
use Stringable;
use Throwable;

class Bban implements Stringable, JsonSerializable
{
    use CloneableTrait;

    protected readonly array $additional;

    public function __construct(
        public readonly ?Country $country,
        public readonly string $accountNumber,
        public readonly ?string $bankIdentifier = null,
        public readonly ?string $branchIdentifier = null,
        public readonly ?string $checkDigits = null,
        string ...$additional,
    ) {
        $this->additional = $additional;
    }

    /**
     * Parse BBAN.
     *
     * @param string $bban
     * @param Country|string|null $country
     *
     * @return static
     */
    public static function parse(string $bban, Country|string|null $country): static
    {
        if (is_string($country)) {
            $country = Country::from($country);
        }

        $bban = preg_replace('/\s/', '', strtoupper($bban));

        // No country
        if (null === $country) {
            return new static(country: null, accountNumber: $bban);
        }

        $arguments = ['country' => $country];
        foreach ($country->getBbanFormat() as $key => $value) {
            if (null === $value) {
                $arguments[$key] = null;
                continue;
            }
            $arguments[$key] = substr($bban, ...$value);
        }

        return new static(...$arguments);
    }

    /**
     * Try to parse BBAN.
     *
     * @param string|null $bban
     * @param Country|null $country
     *
     * @return static|null
     */
    public static function tryParse(string|null $bban, Country|null $country = null): ?static
    {
        if (null === $bban || null === $country) {
            return null;
        }

        try {
            return static::parse($bban, $country);
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
    public function jsonSerialize(): array
    {
        return [
            'country' => $this->country->name,
            'bban' => $this->format(),
        ];
    }

    /**
     * Get additional parameter.
     *
     * @param string $name
     *
     * @return string
     */
    public function __get(string $name): string
    {
        if (false === array_key_exists($name, $this->additional)) {
            throw new RuntimeException(
                sprintf(
                    'Unknown parameter "%s" for BBAN of country %s',
                    $name,
                    $this->country->name
                )
            );
        }

        return $this->additional[$name];
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
        $bbanFormat = $this->country->getBbanFormat();
        $bbanFormat = array_filter($bbanFormat);
        uasort(
            $bbanFormat,
            function ($param1, $param2) {
                if (count($param1) == 1) {
                    return 1;
                }

                if (count($param2) == 1) {
                    return -1;
                }

                if ($param1[0] < 0 && $param2[0] > 0) {
                    return -1;
                }

                if ($param2[0] < 0 && $param1[0] > 0) {
                    return -1;
                }

                return abs($param1[0]) <=> abs($param2[0]);
            }
        );

        $bbanFormatKeys = array_keys($bbanFormat);
        $str = array_map(fn($key) => $this->{$key} ?? '', $bbanFormatKeys);

        return
            implode(
                $condensed ? '' : ' ',
                str_split(implode($str), 4)
            );
    }

    /**
     * Is valid BBAN?
     *
     * @return bool
     */
    public function isValid(): bool
    {
        return BbanValidation::validate($this);
    }
}