<?php
/*
 * @license   https://opensource.org/licenses/MIT MIT License
 * @copyright 2022 Ronan GIRON
 * @author    Ronan GIRON <https://github.com/ElGigi>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code, to the root.
 */

declare(strict_types=1);

namespace ElGigi\Iban;

use RuntimeException;

enum Currency
{
    case AED;
    case ALL;
    case AZM;
    case BAM;
    case BGN;
    case BHD;
    case BRL;
    case BYR;
    case CHF;
    case CRC;
    case CYP;
    case CZK;
    case DKK;
    case DOP;
    case EEK;
    case EGP;
    case EUR;
    case GBP;
    case GEL;
    case GIP;
    case GTQ;
    case HRK;
    case HUF;
    case ILS;
    case ISK;
    case IQD;
    case JOD;
    case KWD;
    case KZT;
    case LBP;
    case LTL;
    case LVL;
    case LYD;
    case MDL;
    case MKD;
    case MRO;
    case MTL;
    case MUR;
    case NOK;
    case PKR;
    case PLN;
    case QAR;
    case ROL;
    case RSD;
    case SAR;
    case SCR;
    case SDG;
    case SEK;
    case SIT;
    case SKK;
    case STD;
    case SVC;
    case TND;
    case TRL;
    case UAH;
    case USD;
    case XCD;

    /**
     * Get currency for country.
     *
     * @param Country $country
     *
     * @return Currency
     */
    public static function country(Country $country): Currency
    {
        return match ($country) {
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
            Country::XK => self::EUR,
            Country::AE => self::AED,
            Country::AL => self::ALL,
            Country::AZ => self::AZM,
            Country::BA => self::BAM,
            Country::BG => self::BGN,
            Country::BH => self::BHD,
            Country::BR => self::BRL,
            Country::BY => self::BYR,
            Country::CH,
            Country::LI => self::CHF,
            Country::CR => self::CRC,
            Country::CY => self::CYP,
            Country::CZ => self::CZK,
            Country::DK,
            Country::FO,
            Country::GL => self::DKK,
            Country::DO => self::DOP,
            Country::EE => self::EEK,
            Country::EG => self::EGP,
            Country::GB => self::GBP,
            Country::GE => self::GEL,
            Country::GI => self::GIP,
            Country::GT => self::GTQ,
            Country::HU => self::HUF,
            Country::HR => self::HRK,
            Country::IL,
            Country::PS => self::ILS,
            Country::IS => self::ISK,
            Country::IQ => self::IQD,
            Country::JO => self::JOD,
            Country::KW => self::KWD,
            Country::KZ => self::KZT,
            Country::LB => self::LBP,
            Country::LC => self::XCD,
            Country::LT => self::LTL,
            Country::LV => self::LVL,
            Country::LY => self::LYD,
            Country::MD => self::MDL,
            Country::MK => self::MKD,
            Country::MR => self::MRO,
            Country::MT => self::MTL,
            Country::MU => self::MUR,
            Country::NO => self::NOK,
            Country::PK => self::PKR,
            Country::PL => self::PLN,
            Country::QA => self::QAR,
            Country::RO => self::ROL,
            Country::RS => self::RSD,
            Country::SA => self::SAR,
            Country::SD => self::SDG,
            Country::SC => self::SCR,
            Country::SE => self::SEK,
            Country::SI => self::SIT,
            Country::SK => self::SKK,
            Country::ST => self::STD,
            Country::SV => self::SVC,
            Country::TL,
            Country::VG => self::USD,
            Country::TN => self::TND,
            Country::TR => self::TRL,
            Country::UA => self::UAH,
            default => throw new RuntimeException(sprintf('Currency not implemented for %s', $country->name)),
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

        foreach (Country::cases() as $country) {
            $currency = self::country($country);

            if ($this !== $currency) {
                continue;
            }

            $countries[] = $country;
        }

        return $countries;
    }
}
