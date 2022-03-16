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

use ElGigi\Iban\Country;
use ElGigi\Iban\Iban;

class IbanTest extends AbstractTest
{
    /**
     * @dataProvider provider
     */
    public function test(array ...$data)
    {
        foreach ($data as $testData) {
            $country = Country::from($testData['iso_country_code']);
            $iban = Iban::parse($testData['iban']);
            $iban2 = Iban::tryParse($testData['iban']);

            $this->assertEquals($iban, $iban2);
            $this->assertSame(
                $country,
                $iban->getCountry(),
                $iban->getCountry()->name . ' IBAN Country'
            );
            $this->assertSame(
                $testData['iban'],
                (string)$iban,
                $iban->getCountry()->name . ' IBAN'
            );
            $this->assertSame(
                $testData['iban'],
                $iban->format(),
                $iban->getCountry()->name . ' IBAN'
            );
            $this->assertSame(
                preg_replace('/\s/', '', $testData['iban']),
                $iban->format(true),
                $iban->getCountry()->name . ' condensed IBAN'
            );
            $this->assertSame(
                $testData['iso_country_code'],
                $iban->getCountry()->name,
                $iban->getCountry()->name . ' IBAN ISO country code'
            );
            $this->assertEquals(
                $testData['iban_check_digits'],
                $iban->checkDigits,
                $iban->getCountry()->name . ' IBAN check digits'
            );
            $this->assertSame(
                $testData['sepa_member'],
                $iban->getCountry()->isSepaMember(),
                $iban->getCountry()->name . ' SEPA Member'
            );
            $this->assertTrue(
                $iban->isValid(),
                $iban->getCountry()->name . ' IBAN validation'
            );

            // Guess check digits
            $this->assertSame(
                $iban->checkDigits,
                Iban::guessCheckDigits($iban),
                $iban->getCountry()->name . ' IBAN guess check digits'

            );
        }
    }

    public function testTryParse()
    {
        $this->assertNull(Iban::tryParse('FAKE'));
        $this->assertNull(Iban::tryParse(null));
    }

    /**
     * @dataProvider provider
     */
    public function testJson(array ...$data)
    {
        foreach ($data as $testData) {
            $iban = Iban::parse($testData['iban']);
            $json = json_decode(json_encode($iban), true);

            $banReconstituted = Iban::parse($json);
            $this->assertEquals($banReconstituted, $iban);
        }
    }
}