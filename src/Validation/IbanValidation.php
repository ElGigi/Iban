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

namespace ElGigi\Iban\Validation;

use ElGigi\Iban\Iban;

class IbanValidation
{
    /**
     * Validate an IBAN.
     *
     * @param Iban|string $iban
     *
     * @return bool
     */
    public static function validate(Iban|string $iban): bool
    {
        is_string($iban) && $iban = Iban::parse($iban);

        if (0 === preg_match(sprintf('/^%s$/i', $iban->getCountry()->getIbanRegex()), $iban->format(true))) {
            return false;
        }

        $ibanStr = strtoupper(
            $iban->bban->format(true) .
            $iban->bban->country->name .
            sprintf('%02d', $iban->checkDigits)
        );

        return 1 === Checksum::modulo(Checksum::numericConversion($ibanStr), 97);
    }
}