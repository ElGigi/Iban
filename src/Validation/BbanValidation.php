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

use ElGigi\Iban\Bban;
use ElGigi\Iban\Country;
use InvalidArgumentException;
use RuntimeException;

class BbanValidation
{
    /**
     * Validate a BBAN.
     *
     * @param Bban|string $bban
     * @param Country|null $country Country (for string representation of BBAN)
     *
     * @return bool
     */
    public static function validate(Bban|string $bban, ?Country $country = null): bool
    {
        if (is_string($bban)) {
            $bban = Bban::parse($bban, $country ?? throw new InvalidArgumentException('Missing country argument #2'));
        }

        if (null === $bban->checkDigits) {
            return true;
        }

        $bban->country ?? throw new RuntimeException('No country defined for BBAN');
        $guessedCheckDigits = static::checkDigits($bban);

        switch ($bban->country) {
            case Country::AL:
            case Country::BE:
            case Country::EE:
            case Country::ES:
            case Country::FR:
            case Country::MC:
            case Country::IT:
            case Country::SM:
            case Country::NO:
            case Country::BA:
            case Country::ME:
            case Country::MK:
            case Country::PT:
            case Country::RS:
            case Country::SI:
            case Country::TL:
            case Country::XK:
            case Country::MR:
            case Country::TN:
            case Country::FI:
                return
                    strtoupper((string)$bban->checkDigits)
                    ===
                    strtoupper((string)$guessedCheckDigits['checkDigits'] ?? '');
            case Country::HU:
                return
                    $bban->checkDigits === ($guessedCheckDigits['checkDigits'] ?? '') &&
                    $bban->additionalCheckDigits === ($guessedCheckDigits['additionalCheckDigits'] ?? '');
            default:
                return true;
        }
    }

    /**
     * Guess check digits.
     *
     * @param Bban|string $bban
     * @param Country|null $country
     *
     * @return string[]
     */
    public static function checkDigits(Bban|string $bban, ?Country $country = null): array
    {
        if (is_string($bban)) {
            $bban = Bban::parse($bban, $country ?? throw new InvalidArgumentException('Missing country argument #2'));
        }

        switch ($bban->country ?? throw new RuntimeException('No country defined for BBAN')) {
            case Country::AL:
                return [
                    'checkDigits' =>
                        (string)(11 - Checksum::weighting(
                                $bban->bankIdentifier . $bban->branchIdentifier . $bban->accountNumber,
                                [9, 7, 3, 1]
                            ) % 11)
                ];
            case Country::BA:
            case Country::ME:
            case Country::MK:
            case Country::PT:
            case Country::RS:
            case Country::SI:
            case Country::TL:
            case Country::XK:
                return [
                    'checkDigits' => sprintf(
                        '%02d',
                        98 - Checksum::modulo(
                            Checksum::numericConversion(
                                $bban->bankIdentifier . $bban->branchIdentifier . $bban->accountNumber . '00'
                            )
                        )
                    )
                ];
            case Country::BE:
                return [
                    'checkDigits' =>
                        sprintf(
                            '%02d',
                            Checksum::modulo(
                                Checksum::numericConversion(
                                    $bban->bankIdentifier . $bban->branchIdentifier . $bban->accountNumber
                                )
                            )
                        )
                ];
            case Country::EE:
                return [
                    'checkDigits' => (string)(Checksum::weighting(
                            $bban->bankIdentifier . $bban->branchIdentifier . $bban->accountNumber,
                            [7, 1, 3]
                        ) % 10)
                ];
            case Country::ES:
                return [
                    'checkDigits' =>
                        (11 - Checksum::weighting(
                                $bban->bankIdentifier . $bban->branchIdentifier,
                                [4, 8, 5, 10, 9, 7, 3, 6]
                            ) % 11) .
                        (11 - Checksum::weighting(
                                $bban->accountNumber,
                                [1, 2, 4, 8, 5, 10, 9, 7, 3, 6]
                            ) % 11)
                ];
            case Country::FI:
                $luhn = Checksum::luhnSum($bban->bankIdentifier . $bban->accountNumber . '0');

                if ($luhn % 10 === 0) {
                    return ['checkDigits' => '0'];
                }

                return ['checkDigits' => (string)(10 - ($luhn % 10))];
            case Country::FR:
            case Country::MC:
                return [
                    'checkDigits' =>
                        sprintf(
                            '%02d',
                            (97 - Checksum::modulo(
                                    Checksum::numericConversion(
                                        $bban->bankIdentifier . $bban->branchIdentifier . $bban->accountNumber . '00',
                                        chars: [
                                            ...array_combine(range('A', 'I'), range(1, 9)),
                                            ...array_combine(range('J', 'R'), range(1, 9)),
                                            ...array_combine(range('S', 'Z'), range(2, 9)),
                                        ]
                                    )
                                ))
                        )
                ];
            case Country::HU:
                $bankChecksum =
                    (10 - (int)substr(
                            (string)Checksum::weighting(
                                $bban->bankIdentifier . $bban->branchIdentifier,
                                [9, 7, 3, 1, 9, 7, 3, 1, 9, 7, 3, 1, 9, 7, 3, 1]
                            ),
                            -1
                        ));
                $bankChecksum == 10 && $bankChecksum = 0;
                $accountChecksum =
                    (10 - (int)substr(
                            (string)Checksum::weighting(
                                $bban->accountNumber,
                                [9, 7, 3, 1, 9, 7, 3, 1, 9, 7, 3, 1, 9, 7, 3, 1]
                            ),
                            -1
                        ));
                $accountChecksum == 10 && $accountChecksum = 0;

                return ['checkDigits' => (string)$bankChecksum, 'additionalCheckDigits' => (string)$accountChecksum];
            case Country::IT:
            case Country::SM:
                $sum = Checksum::numericConversionOddEven(
                    strtoupper($bban->bankIdentifier . $bban->branchIdentifier . $bban->accountNumber),
                    odd: [
                        ...array_combine(range(0, 9), [1, 0, 5, 7, 9, 13, 15, 17, 19, 21]),
                        ...array_combine(
                            range('A', 'Z'),
                            [
                                1,
                                0,
                                5,
                                7,
                                9,
                                13,
                                15,
                                17,
                                19,
                                21,
                                2,
                                4,
                                18,
                                20,
                                11,
                                3,
                                6,
                                8,
                                12,
                                14,
                                16,
                                10,
                                22,
                                25,
                                24,
                                23
                            ]
                        ),
                    ],
                    even: [
                        ...array_combine(range(0, 9), range(0, 9)),
                        ...array_combine(range('A', 'Z'), range(0, 25)),
                    ]
                );
                $sum = array_sum($sum);

                return ['checkDigits' => chr(($sum % 26) + 65)];
            case Country::MR:
            case Country::TN:
                return [
                    'checkDigits' =>
                        sprintf(
                            '%02d',
                            97 - Checksum::modulo(
                                Checksum::numericConversion(
                                    $bban->bankIdentifier . $bban->branchIdentifier . $bban->accountNumber . '00'
                                )
                            )
                        )
                ];
            case Country::NO:
                $testOn = $bban->bankIdentifier . $bban->accountNumber;
                if (str_starts_with($bban->accountNumber, '00')) {
                    $testOn = substr($bban->accountNumber, 2);
                }

                return [
                    'checkDigits' => (string)(11 - Checksum::weighting($testOn, [5, 4, 3, 2, 7, 6, 5, 4, 3, 2]) % 11)
                ];
            default:
                return [];
        }
    }
}