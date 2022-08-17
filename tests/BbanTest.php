<?php
/*
 * @license   https://opensource.org/licenses/MIT MIT License
 * @copyright 2022 Ronan GIRON
 * @author    Ronan GIRON <https://github.com/ElGigi>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code, to the root.
 */

namespace ElGigi\Iban\Tests;

use ElGigi\Iban\Bban;
use ElGigi\Iban\Country;
use ElGigi\Iban\Iban;
use ElGigi\Iban\Validation\BbanValidation;

class BbanTest extends AbstractTest
{
    /**
     * @dataProvider provider
     */
    public function test(array ...$data)
    {
        foreach ($data as $testData) {
            $country = Country::from($testData['iso_country_code']);
            $bban = Bban::parse($testData['bban'], $country);
            $bban2 = Bban::tryParse($testData['bban'], $country);

            $this->assertEquals($bban, $bban2);
            $this->assertSame(
                $testData['bban'],
                (string)$bban,
                sprintf('%s BBAN (%s)', $bban->country->name, $bban)
            );
            $this->assertSame(
                $testData['bban'],
                $bban->format(),
                sprintf('%s BBAN (%s)', $bban->country->name, $bban)
            );
            $this->assertSame(
                preg_replace('/\s/', '', $testData['bban']),
                $bban->format(true),
                sprintf('%s condensed BBAN (%s)', $bban->country->name, $bban)
            );
            $this->assertSame(
                $testData['bank_identifier'],
                $bban->bankIdentifier,
                sprintf('%s BBAN bank identifier (%s)', $bban->country->name, $bban)
            );
            $this->assertSame(
                $testData['branch_identifier'],
                $bban->branchIdentifier,
                sprintf('%s BBAN branch identifier (%s)', $bban->country->name, $bban)
            );
            $this->assertSame(
                $testData['account_number'],
                $bban->accountNumber,
                sprintf('%s BBAN account number (%s)', $bban->country->name, $bban)
            );
            $this->assertSame(
                $testData['bban_check_digits'],
                $bban->checkDigits,
                sprintf('%s BBAN check digits (%s)', $bban->country->name, $bban)
            );
            $this->assertTrue(
                $bban->isValid(),
                sprintf('%s BBAN validation (%s)', $bban->country->name, $bban)
            );

            // Generate IBAN
            $this->assertEquals(
                Iban::parse($testData['iban']),
                $bban->generateIban(),
                sprintf('%s BBAN generate new IBAN (%s)', $bban->country->name, $bban)
            );

            // Guess check digits
            if ($bban->country->getBbanFormat()['checkDigits']) {
                $checkDigits = BbanValidation::checkDigits($bban);

                foreach ($checkDigits as $key => $value) {
                    $this->assertSame(
                        $bban->{$key},
                        $value,
                        $bban->country->name . ' BBAN guess check digits'

                    );
                }
            }
        }
    }

    public function testTryParse()
    {
        $this->assertNull(Bban::tryParse('FAKE'));
        $this->assertNull(Bban::tryParse('FAKE', 'FAKE'));
        $this->assertNull(Bban::tryParse(null));
    }

    /**
     * @dataProvider provider
     */
    public function testJson(array ...$data)
    {
        foreach ($data as $testData) {
            $iban = Bban::parse($testData['bban'], Country::from($testData['iso_country_code']));
            $json = json_decode(json_encode($iban), true);

            $banReconstituted = Bban::parse($json['bban'], $json['country']);
            $this->assertEquals($banReconstituted, $iban);
        }
    }
}