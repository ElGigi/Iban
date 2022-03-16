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
                $bban->country->name . ' BBAN'
            );
            $this->assertSame(
                $testData['bban'],
                $bban->format(),
                $bban->country->name . ' BBAN'
            );
            $this->assertSame(
                preg_replace('/\s/', '', $testData['bban']),
                $bban->format(true),
                $bban->country->name . ' condensed BBAN'
            );
            $this->assertSame(
                $testData['bank_identifier'],
                $bban->bankIdentifier,
                $bban->country->name . ' BBAN bank identifier'
            );
            $this->assertSame(
                $testData['branch_identifier'],
                $bban->branchIdentifier,
                $bban->country->name . ' BBAN branch identifier'
            );
            $this->assertSame(
                $testData['account_number'],
                $bban->accountNumber,
                $bban->country->name . ' BBAN account number'
            );
            $this->assertSame(
                $testData['bban_check_digits'],
                $bban->checkDigits,
                $bban->country->name . ' BBAN check digits'
            );
            $this->assertTrue(
                $bban->isValid(),
                $bban->country->name . ' BBAN validation'
            );

            // Generate IBAN
            $this->assertEquals(
                Iban::parse($testData['iban']),
                $bban->generateIban(),
                $bban->country->name . ' BBAN generate new IBAN'
            );
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