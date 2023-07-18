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
use PHPUnit\Framework\TestCase;

class CountryTest extends TestCase
{
    public function testIsSepaMember()
    {
        $sepaMembers = Country::sepaMembers();

        foreach (Country::implementedCases() as $country) {
            $this->assertEquals(
                in_array($country, $sepaMembers),
                $country->isSepaMember(),
            );
        }
    }

    public function testGetCurrency()
    {
        foreach (Country::implementedCases() as $country) {
            $this->assertNotEmpty($country->getCurrency());
        }
    }

    public function testGetBbanRegex()
    {
        foreach (Country::implementedCases() as $country) {
            $this->assertNotEmpty($country->getIbanRegex());
        }
    }

    public function testGetLanguage()
    {
        foreach (Country::implementedCases() as $country) {
            $this->assertNotEmpty($country->getLanguage());
        }
    }

    public function testGetLocale()
    {
        foreach (Country::implementedCases() as $country) {
            $this->assertNotEmpty($country->getLocale());
        }
    }
}
