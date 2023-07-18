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
use ElGigi\Iban\Language;
use PHPUnit\Framework\TestCase;

class LanguageTest extends TestCase
{
    public function testGetCountries()
    {
        $this->assertEquals(
            [
                Country::BE,
                Country::CH,
                Country::FR,
                Country::LU,
                Country::MC,
                Country::MR,
                Country::MU,
                Country::NC
            ],
            Language::fr->getCountries()
        );
        $this->assertEquals(
            [
                Country::GB,
                Country::GI,
                Country::IE,
                Country::LC,
                Country::MT,
                Country::MU,
                Country::PK,
                Country::SC,
                Country::VG,
            ],
            Language::en->getCountries()
        );
    }
}
