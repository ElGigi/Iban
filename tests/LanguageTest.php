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
                Country::BI,
                Country::CD,
                Country::CG,
                Country::CH,
                Country::DJ,
                Country::FR,
                Country::GN,
                Country::HT,
                Country::LU,
                Country::MC,
                Country::MG,
                Country::MR,
                Country::MU,
                Country::NC,
                Country::SX,
                Country::VU
            ],
            Language::fr->getCountries()
        );
        $this->assertEquals(
            [
                Country::AU,
                Country::BB,
                Country::BM,
                Country::BS,
                Country::BW,
                Country::BZ,
                Country::CA,
                Country::FJ,
                Country::FK,
                Country::GB,
                Country::GH,
                Country::GI,
                Country::GM,
                Country::GY,
                Country::IE,
                Country::JM,
                Country::KE,
                Country::KY,
                Country::LC,
                Country::LR,
                Country::LS,
                Country::MT,
                Country::MU,
                Country::MW,
                Country::NA,
                Country::NG,
                Country::NZ,
                Country::PG,
                Country::PK,
                Country::SB,
                Country::SC,
                Country::SG,
                Country::SH,
                Country::SL,
                Country::SS,
                Country::SX,
                Country::SZ,
                Country::TT,
                Country::UG,
                Country::US,
                Country::VG,
                Country::VU,
                Country::ZA,
                Country::ZM,
                Country::ZW,
            ],
            Language::en->getCountries()
        );
    }
}
