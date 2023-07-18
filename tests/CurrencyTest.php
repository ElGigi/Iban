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
use ElGigi\Iban\Currency;
use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{
    public function testGetCountries()
    {
        foreach (Currency::cases() as $currency) {
            $this->assertNotEmpty($currency->getCountries());
        }
    }

    public function testGetCountries_multiple()
    {
        $this->assertEquals(
            [
                Country::AD,
                Country::AT,
                Country::BE,
                Country::DE,
                Country::ES,
                Country::FI,
                Country::FR,
                Country::GR,
                Country::IE,
                Country::IT,
                Country::LU,
                Country::MC,
                Country::ME,
                Country::NL,
                Country::PT,
                Country::SM,
                Country::VA,
                Country::XK,
            ],
            Currency::EUR->getCountries()
        );
        $this->assertEquals(
            [
                Country::TL,
                Country::VG,
            ],
            Currency::USD->getCountries()
        );
    }
}
