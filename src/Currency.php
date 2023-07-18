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

enum Currency: string
{
    case AED = 'AED';
    case ALL = 'ALL';
    case AZM = 'AZM';
    case BAM = 'BAM';
    case BGN = 'BGN';
    case BHD = 'BHD';
    case BRL = 'BRL';
    case BYR = 'BYR';
    case CHF = 'CHF';
    case CRC = 'CRC';
    case CYP = 'CYP';
    case CZK = 'CZK';
    case DKK = 'DKK';
    case DOP = 'DOP';
    case EEK = 'EEK';
    case EGP = 'EGP';
    case EUR = 'EUR';
    case GBP = 'GBP';
    case GEL = 'GEL';
    case GIP = 'GIP';
    case GTQ = 'GTQ';
    case HRK = 'HRK';
    case HUF = 'HUF';
    case ILS = 'ILS';
    case ISK = 'ISK';
    case IQD = 'IQD';
    case JOD = 'JOD';
    case KWD = 'KWD';
    case KZT = 'KZT';
    case LBP = 'LBP';
    case LTL = 'LTL';
    case LVL = 'LVL';
    case LYD = 'LYD';
    case MDL = 'MDL';
    case MKD = 'MKD';
    case MRO = 'MRO';
    case MTL = 'MTL';
    case MUR = 'MUR';
    case NOK = 'NOK';
    case PKR = 'PKR';
    case PLN = 'PLN';
    case QAR = 'QAR';
    case ROL = 'ROL';
    case RSD = 'RSD';
    case SAR = 'SAR';
    case SCR = 'SCR';
    case SDG = 'SDG';
    case SEK = 'SEK';
    case SIT = 'SIT';
    case SKK = 'SKK';
    case STD = 'STD';
    case SVC = 'SVC';
    case TND = 'TND';
    case TRL = 'TRL';
    case UAH = 'UAH';
    case USD = 'USD';
    case XCD = 'XCD';
    case XPF = 'XPF';

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
            Country::NC => self::XPF,
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

        foreach (Country::implementedCases() as $country) {
            $currency = self::country($country);

            if ($this !== $currency) {
                continue;
            }

            $countries[] = $country;
        }

        return $countries;
    }
}
