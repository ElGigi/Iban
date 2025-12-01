<?php
/*
 * @license   https://opensource.org/licenses/MIT MIT License
 * @copyright 2022 Ronan GIRON
 * @author    Ronan GIRON <https://github.com/ElGigi>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code, to the root.
 */

namespace ElGigi\Iban;

use RuntimeException;

enum Language: string
{
    case am = 'am';
    case ar = 'ar';
    case az_Cyrl = 'az_Cyrl';
    case az_Latn = 'az_Latn';
    case be = 'be';
    case bg = 'bg';
    case bi = 'bi';
    case bn = 'bn';
    case ca = 'ca';
    case cs = 'cs';
    case da = 'da';
    case de = 'de';
    case dv = 'dv';
    case dz = 'dz';
    case el = 'el';
    case en = 'en';
    case es = 'es';
    case et = 'et';
    case fa = 'fa';
    case ff = 'ff';
    case fi = 'fi';
    case fo = 'fo';
    case fr = 'fr';
    case ga = 'ga';
    case gsw = 'gsw';
    case hi = 'hi';
    case hr = 'hr';
    case hu = 'hu';
    case hy = 'hy';
    case id = 'id';
    case is = 'is';
    case it = 'it';
    case iw = 'iw';
    case ja = 'ja';
    case ka = 'ka';
    case kk = 'kk';
    case kl = 'kl';
    case km = 'km';
    case ko = 'ko';
    case ky = 'ky';
    case lo = 'lo';
    case lt = 'lt';
    case lv = 'lv';
    case mfe = 'mfe';
    case mk = 'mk';
    case mn = 'mn';
    case ms = 'ms';
    case mt = 'mt';
    case my = 'my';
    case ne = 'ne';
    case nl = 'nl';
    case no = 'no';
    case os = 'os';
    case pa_Arab = 'pa_Arab';
    case pl = 'pl';
    case pt = 'pt';
    case ro = 'ro';
    case ru = 'ru';
    case rw = 'rw';
    case si = 'si';
    case sm = 'sm';
    case sk = 'sk';
    case sl = 'sl';
    case so = 'so';
    case sq = 'sq';
    case sr = 'sr';
    case sv = 'sv';
    case sw = 'sw';
    case tg = 'tg';
    case th = 'th';
    case tl = 'tl';
    case tk = 'tk';
    case to = 'to';
    case tr = 'tr';
    case uk = 'uk';
    case ur = 'ur';
    case uz = 'uz';
    case vi = 'vi';
    case zh = 'zh';
    case af = 'af';
    case nr = 'nr';
    case st = 'st';
    case ss = 'ss';
    case tn = 'tn';
    case ts = 'ts';
    case ve = 've';
    case xh = 'xh';
    case zu = 'zu';

    /**
     * Get language(s) for country.
     *
     * @param Country $country
     *
     * @return Language|Language[]
     */
    public static function country(Country $country): Language|array
    {
        return match ($country) {
            Country::AE,
            Country::BH,
            Country::EG,
            Country::IQ,
            Country::JO,
            Country::KW,
            Country::LB,
            Country::LY,
            Country::OM,
            Country::PS,
            Country::QA,
            Country::SA,
            Country::SD,
            Country::SY,
            Country::TN,
            Country::YE,
            Country::MA,
            Country::KM,
            Country::ER,
            Country::DZ => self::ar,
            Country::AD => self::ca,
            Country::AL,
            Country::XK => self::sq,
            Country::AT,
            Country::DE => self::de,
            Country::BG => self::bg,
            Country::BY => self::be,
            Country::BT => self::dz,
            Country::CY,
            Country::GR => self::el,
            Country::CZ => self::cs,
            Country::DK => self::da,
            Country::EE => self::et,
            Country::FI => self::fi,
            Country::FO => self::fo,
            Country::HU => self::hu,
            Country::HR => self::hr,
            Country::IS => self::is,
            Country::IT,
            Country::SM,
            Country::VA => self::it,
            Country::LT => self::lt,
            Country::LV => self::lv,
            Country::MK => self::mk,
            Country::NL,
            Country::AW,
            Country::SR => self::nl,
            Country::NO => self::no,
            Country::PL => self::pl,
            Country::RO => self::ro,
            Country::SE => self::sv,
            Country::SI => self::sl,
            Country::SK => self::sk,
            Country::TR => self::tr,
            Country::CH => [
                self::fr,
                self::de,
                self::it,
            ],
            Country::BE => [
                self::fr,
                self::nl,
            ],
            Country::SX => [
                self::nl,
                self::en,
                self::fr,
            ],
            Country::BR,
            Country::PT,
            Country::ST,
            Country::TL,
            Country::AO,
            Country::MZ,
            Country::CV,
            Country::GW => self::pt,
            Country::FR,
            Country::MC,
            Country::NC,
            Country::BI,
            Country::MG,
            Country::HT,
            Country::GN,
            Country::DJ,
            Country::CG,
            Country::CD => self::fr,
            Country::GB,
            Country::GI,
            Country::LC,
            Country::SC,
            Country::VG,
            Country::AU,
            Country::BB,
            Country::BM,
            Country::BW,
            Country::BZ,
            Country::CA,
            Country::ZW,
            Country::ZM,
            Country::US,
            Country::UG,
            Country::TT,
            Country::SS,
            Country::SL,
            Country::SH,
            Country::SG,
            Country::SB,
            Country::PG,
            Country::NZ,
            Country::NG,
            Country::NA,
            Country::MW,
            Country::LS,
            Country::LR,
            Country::KY,
            Country::KE,
            Country::JM,
            Country::GY,
            Country::GM,
            Country::GH,
            Country::FK,
            Country::FJ,
            Country::BS,
            Country::SZ => self::en,
            Country::ES => [
                self::es,
                self::ca,
            ],
            Country::CR,
            Country::DO,
            Country::GT,
            Country::SV,
            Country::AR,
            Country::BO,
            Country::VE,
            Country::UY,
            Country::PY,
            Country::PE,
            Country::PA,
            Country::NI,
            Country::MX,
            Country::HN,
            Country::EC,
            Country::CU,
            Country::CO,
            Country::CL => self::es,
            Country::GE => [
                self::ka,
                self::os,
            ],
            Country::GL => [
                self::da,
                self::kl,
            ],
            Country::IE => [
                self::en,
                self::ga,
            ],
            Country::IL => self::iw,
            Country::LI => [
                self::de,
                self::gsw,
            ],
            Country::LU => [
                self::fr,
                self::de,
            ],
            Country::MD => [
                self::ro,
                self::ru,
            ],
            Country::MR => [
                self::fr,
                self::ar,
                self::ff,
            ],
            Country::MT => [
                self::en,
                self::mt,
            ],
            Country::MU => [
                self::fr,
                self::en,
                self::mfe,
            ],
            Country::PK => [
                self::en,
                self::pa_Arab,
                self::ur,
            ],
            Country::UA => [
                self::uk,
                self::ru,
            ],
            Country::AZ => [
                self::az_Latn,
                self::az_Cyrl,
            ],
            Country::BA,
            Country::ME,
            Country::RS => self::sr,
            Country::KZ => [
                self::kk,
                self::ru,
            ],
            Country::KG => [
                self::ky,
                self::ru,
            ],
            Country::RU => self::ru,
            Country::AF,
            Country::IR => self::fa,
            Country::AM => self::hy,
            Country::BD => self::bn,
            Country::ET => self::am,
            Country::ID => self::id,
            Country::IN => self::hi,
            Country::JP => self::ja,
            Country::KH => self::km,
            Country::KP,
            Country::KR => self::ko,
            Country::LA => self::lo,
            Country::LK => self::si,
            Country::MM => self::my,
            Country::MN => self::mn,
            Country::MV => self::dv,
            Country::NP => self::ne,
            Country::PH => self::tl,
            Country::RW => self::rw,
            Country::TJ => self::tg,
            Country::TH => self::th,
            Country::TM => self::tk,
            Country::TO => self::to,
            Country::TZ => self::sw,
            Country::UZ => self::uz,
            Country::VN => self::vi,
            Country::WS => self::sm,
            Country::VU => [
                self::bi,
                self::en,
                self::fr,
            ],
            Country::SO => self::so,
            Country::CN,
            Country::TW,
            Country::MO,
            Country::HK => self::zh,
            Country::BN,
            Country::MY => self::ms,
            Country::ZA => [
                self::zu,
                self::xh,
                self::af,
                self::en,
                self::st,
                self::tn,
                self::ts,
                self::ve,
                self::nr,
                self::ss,
            ],
            default => throw new RuntimeException(sprintf('Language not implemented for %s', $country->name)),
        };
    }

    /**
     * Get countries for a language.
     *
     * @return Country[]
     */
    public function getCountries(): array
    {
        $countries = [];

        foreach (Country::implementedCases() as $country) {
            $languages = self::country($country);
            if (!is_array($languages)) {
                $languages = [$languages];
            }

            if (!in_array($this, $languages, true)) {
                continue;
            }

            $countries[] = $country;
        }

        return $countries;
    }
}
