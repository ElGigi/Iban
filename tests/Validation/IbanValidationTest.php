<?php
/*
 * @license   https://opensource.org/licenses/MIT MIT License
 * @copyright 2022 Ronan GIRON
 * @author    Ronan GIRON <https://github.com/ElGigi>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code, to the root.
 */

namespace ElGigi\Iban\Tests\Validation;

use ElGigi\Iban\Validation\IbanValidation;
use PHPUnit\Framework\TestCase;

class IbanValidationTest extends TestCase
{
    public function provider(): array
    {
        return [
            [
                'iban' => 'AD12 0001 2030 2003 5910 0100',
                'valid' => true,
            ],
            [
                'iban' => 'rs18datagadisp',
                'valid' => false,
            ],
        ];
    }

    /**
     * @dataProvider provider
     */
    public function testValidate(string $iban, bool $valid)
    {
        $this->assertSame($valid, IbanValidation::validate($iban));
    }
}
