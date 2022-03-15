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

final class Checksum
{
    /**
     * Calculate modulo.
     *
     * @param string $str
     * @param int $nb
     *
     * @return int
     */
    public static function modulo(
        string $str,
        int $nb = 97,
    ): int {
        $prev = 0;

        for ($pos = 0; ; $pos += 7) {
            $substr = substr($str, $pos, 7);
            if ('' == $substr) {
                break;
            }

            $prev = (int)($prev . $substr) % $nb;
        }

        return $prev;
    }

    /**
     * Numeric conversion of alpha characters.
     *
     * @param string $str
     * @param array|null $chars
     *
     * @return string
     */
    public static function numericConversion(string $str, ?array $chars = null): string
    {
        $nbChars = strlen($str);

        // Convert alpha characters to numeric
        $final = '';
        for ($i = 0; $i < $nbChars; $i++) {
            $char = $str[$i];

            // Numeric
            if (is_numeric($char)) {
                $final .= $char;
                continue;
            }

            if ($chars) {
                $final .= $chars[$str[$i]] ?? 0;
                continue;
            }

            // Convert alpha to numeric, starts at 10
            $final .= ord($str[$i]) - 55;
        }

        return $final;
    }

    /**
     * Numeric conversion of alpha characters odd/even.
     *
     * @param string $str
     * @param array $odd
     * @param array $even
     *
     * @return array
     */
    public static function numericConversionOddEven(string $str, array $odd, array $even): array
    {
        $final = [];
        $strLength = strlen($str);

        for ($i = 0; $i < $strLength; $i++) {
            if (($i + 1) % 2 == 0) {
                $final[] = $even[$str[$i]];
                continue;
            }

            $final[] = $odd[$str[$i]];
        }

        return $final;
    }

    public static function weighting(string $str, array $weights = []): int
    {
        $sum = 0;

        $strLength = strlen($str);
        while (count($weights) < $strLength) {
            array_push($weights, ...$weights);
        }

        for ($i = 0; $i < $strLength; $i++) {
            $sum += (int)$str[$i] * $weights[$i];
        }

        return $sum;
    }

    public static function luhn(string $str, bool $even = true): bool
    {
        $sum = [];
        $strLength = strlen($str);
        $step = 0;

        for ($i = $strLength - 1; $i >= 0; $i--) {
            $step++;

            if ($step % 2 == (int)$even) {
                $sum[] = (int)$str[$i];
                continue;
            }

            $tmp = (int)$str[$i] * 2;
            if ($tmp > 9) {
                $sum[] = $tmp - 9;
                continue;
            }

            $sum[] = $tmp;
        }

        return 0 == (array_sum($sum) % 10);
    }
}