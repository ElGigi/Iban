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
    case ar = 'ar';
    case az_Latn = 'az_Latn';
    case az_Cyrl = 'az_Cyrl';
    case be = 'be';
    case bg = 'bg';
    case ca = 'ca';
    case cs = 'cs';
    case da = 'da';
    case de = 'de';
    case el = 'el';
    case en = 'en';
    case es = 'es';
    case et = 'et';
    case ff = 'ff';
    case fi = 'fi';
    case fo = 'fo';
    case fr = 'fr';
    case ga = 'ga';
    case gsw = 'gsw';
    case hr = 'hr';
    case hu = 'hu';
    case is = 'is';
    case it = 'it';
    case iw = 'iw';
    case ka = 'ka';
    case kk = 'kk';
    case kl = 'kl';
    case lt = 'lt';
    case lv = 'lv';
    case mfe = 'mfe';
    case mk = 'mk';
    case mt = 'mt';
    case nl = 'nl';
    case no = 'no';
    case os = 'os';
    case pa_Arab = 'pa_Arab';
    case pl = 'pl';
    case pt = 'pt';
    case sq = 'sq';
    case sr = 'sr';
    case ro = 'ro';
    case ru = 'ru';
    case sk = 'sk';
    case sl = 'sl';
    case sv = 'sv';
    case tr = 'tr';
    case uk = 'uk';
    case ur = 'ur';

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
            Country::AD => self::ca,
            Country::AE,
            Country::BH,
            Country::EG,
            Country::IQ,
            Country::JO,
            Country::KW,
            Country::LB,
            Country::LY,
            Country::PS,
            Country::QA,
            Country::SA,
            Country::SD,
            Country::TN => self::ar,
            Country::AL,
            Country::XK => self::sq,
            Country::AT,
            Country::DE => self::de,
            Country::AZ => [self::az_Latn, self::az_Cyrl],
            Country::BA,
            Country::ME,
            Country::RS => self::sr,
            Country::BE => [self::fr, self::nl],
            Country::BG => self::bg,
            Country::BR,
            Country::PT,
            Country::ST,
            Country::TL => self::pt,
            Country::BY => self::be,
            Country::CH => [self::fr, self::de, self::it],
            Country::CR,
            Country::DO,
            Country::GT,
            Country::SV => self::es,
            Country::CY,
            Country::GR => self::el,
            Country::CZ => self::cs,
            Country::DK => self::da,
            Country::EE => self::et,
            Country::ES => [self::es, self::ca],
            Country::FI => self::fi,
            Country::FO => self::fo,
            Country::FR,
            Country::MC,
            Country::NC => self::fr,
            Country::GB,
            Country::GI,
            Country::LC,
            Country::SC,
            Country::VG => self::en,
            Country::GE => [self::ka, self::os],
            Country::GL => [self::da, self::kl],
            Country::HU => self::hu,
            Country::HR => self::hr,
            Country::IE => [self::en, self::ga],
            Country::IL => self::iw,
            Country::IS => self::is,
            Country::IT,
            Country::SM,
            Country::VA => self::it,
            Country::KZ => [self::kk, self::ru],
            Country::LI => [self::de, self::gsw],
            Country::LT => self::lt,
            Country::LU => [self::fr, self::de],
            Country::LV => self::lv,
            Country::MD => [self::ro, self::ru],
            Country::MK => self::mk,
            Country::MR => [self::fr, self::ar, self::ff],
            Country::MT => [self::en, self::mt],
            Country::MU => [self::fr, self::en, self::mfe],
            Country::NL => self::nl,
            Country::NO => self::no,
            Country::PK => [self::en, self::pa_Arab, self::ur],
            Country::PL => self::pl,
            Country::RO => self::ro,
            Country::SE => self::sv,
            Country::SI => self::sl,
            Country::SK => self::sk,
            Country::TR => self::tr,
            Country::UA => [self::uk, self::ru],
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

            if (!in_array($this, $languages)) {
                continue;
            }

            $countries[] = $country;
        }

        return $countries;
    }
}