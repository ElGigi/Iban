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

/**
 * Currency ISO 4217.
 */
enum Currency: string
{
    case AED = 'AED';
    case AFN = 'AFN';
    case ALL = 'ALL';
    case AMD = 'AMD';
    case AOA = 'AOA';
    case ARS = 'ARS';
    case AUD = 'AUD';
    case AWG = 'AWG';
    case AZN = 'AZN';
    case BAM = 'BAM';
    case BBD = 'BBD';
    case BDT = 'BDT';
    case BGN = 'BGN';
    case BHD = 'BHD';
    case BIF = 'BIF';
    case BMD = 'BMD';
    case BND = 'BND';
    case BOB = 'BOB';
    case BRL = 'BRL';
    case BSD = 'BSD';
    case BTN = 'BTN';
    case BWP = 'BWP';
    case BYN = 'BYN';
    case BZD = 'BZD';
    case CAD = 'CAD';
    case CDF = 'CDF';
    case CHF = 'CHF';
    case CLP = 'CLP';
    case CNY = 'CNY';
    case COP = 'COP';
    case CRC = 'CRC';
    case CUP = 'CUP';
    case CVE = 'CVE';
    case CZK = 'CZK';
    case DJF = 'DJF';
    case DKK = 'DKK';
    case DOP = 'DOP';
    case DZD = 'DZD';
    case EGP = 'EGP';
    case ERN = 'ERN';
    case ETB = 'ETB';
    case EUR = 'EUR';
    case FJD = 'FJD';
    case FKP = 'FKP';
    case GBP = 'GBP';
    case GEL = 'GEL';
    case GHS = 'GHS';
    case GIP = 'GIP';
    case GMD = 'GMD';
    case GNF = 'GNF';
    case GTQ = 'GTQ';
    case GYD = 'GYD';
    case HKD = 'HKD';
    case HNL = 'HNL';
    case HTG = 'HTG';
    case HUF = 'HUF';
    case IDR = 'IDR';
    case ILS = 'ILS';
    case INR = 'INR';
    case IQD = 'IQD';
    case IRR = 'IRR';
    case ISK = 'ISK';
    case JMD = 'JMD';
    case JOD = 'JOD';
    case JPY = 'JPY';
    case KES = 'KES';
    case KGS = 'KGS';
    case KHR = 'KHR';
    case KMF = 'KMF';
    case KPW = 'KPW';
    case KRW = 'KRW';
    case KZT = 'KZT';
    case KWD = 'KWD';
    case KYD = 'KYD';
    case LAK = 'LAK';
    case LBP = 'LBP';
    case LKR = 'LKR';
    case LRD = 'LRD';
    case LSL = 'LSL';
    case LYD = 'LYD';
    case MAD = 'MAD';
    case MDL = 'MDL';
    case MGA = 'MGA';
    case MKD = 'MKD';
    case MMK = 'MMK';
    case MNT = 'MNT';
    case MOP = 'MOP';
    case MRU = 'MRU';
    case MUR = 'MUR';
    case MVR = 'MVR';
    case MWK = 'MWK';
    case MXN = 'MXN';
    case MYR = 'MYR';
    case MZN = 'MZN';
    case NAD = 'NAD';
    case NGN = 'NGN';
    case NIO = 'NIO';
    case NOK = 'NOK';
    case NPR = 'NPR';
    case NZD = 'NZD';
    case OMR = 'OMR';
    case PAB = 'PAB';
    case PEN = 'PEN';
    case PGK = 'PGK';
    case PHP = 'PHP';
    case PKR = 'PKR';
    case PLN = 'PLN';
    case PYG = 'PYG';
    case QAR = 'QAR';
    case RON = 'RON';
    case RSD = 'RSD';
    case RUB = 'RUB';
    case RWF = 'RWF';
    case SAR = 'SAR';
    case SBD = 'SBD';
    case SCR = 'SCR';
    case SDG = 'SDG';
    case SEK = 'SEK';
    case SGD = 'SGD';
    case SHP = 'SHP';
    case SLE = 'SLE';
    case SOS = 'SOS';
    case SRD = 'SRD';
    case SSP = 'SSP';
    case STN = 'STN';
    case SVC = 'SVC';
    case SYP = 'SYP';
    case SZL = 'SZL';
    case THB = 'THB';
    case TJS = 'TJS';
    case TMT = 'TMT';
    case TND = 'TND';
    case TOP = 'TOP';
    case TRY = 'TRY';
    case TTD = 'TTD';
    case TWD = 'TWD';
    case TZS = 'TZS';
    case UAH = 'UAH';
    case UGX = 'UGX';
    case USD = 'USD';
    case UYU = 'UYU';
    case UZS = 'UZS';
    case VES = 'VES';
    case VND = 'VND';
    case VUV = 'VUV';
    case WST = 'WST';
    case XAF = 'XAF';
    case XCD = 'XCD';
    case XCG = 'XCG';
    case XOF = 'XOF';
    case XPF = 'XPF';
    case YER = 'YER';
    case ZAR = 'ZAR';
    case ZMW = 'ZMW';
    case ZWL = 'ZWL';

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
            Country::CY,
            Country::DE,
            Country::EE,
            Country::ES,
            Country::FI,
            Country::FR,
            Country::GR,
            Country::HR,
            Country::IE,
            Country::IT,
            Country::LT,
            Country::LU,
            Country::LV,
            Country::MC,
            Country::ME,
            Country::MT,
            Country::NL,
            Country::PT,
            Country::SI,
            Country::SK,
            Country::SM,
            Country::VA,
            Country::XK => self::EUR,
            Country::AE => self::AED,
            Country::AF => self::AFN,
            Country::AL => self::ALL,
            Country::AM => self::AMD,
            Country::AO => self::AOA,
            Country::AR => self::ARS,
            Country::AU => self::AUD,
            Country::AW => self::AWG,
            Country::AZ => self::AZN,
            Country::BA => self::BAM,
            Country::BB => self::BBD,
            Country::BD => self::BDT,
            Country::BG => self::BGN,
            Country::BH => self::BHD,
            Country::BI => self::BIF,
            Country::BM => self::BMD,
            Country::BN => self::BND,
            Country::BO => self::BOB,
            Country::BS => self::BSD,
            Country::BT => self::BTN,
            Country::BR => self::BRL,
            Country::BY => self::BYN,
            Country::BW => self::BWP,
            Country::BZ => self::BZD,
            Country::CA => self::CAD,
            Country::CD => self::CDF,
            Country::CH,
            Country::LI => self::CHF,
            Country::CG => self::XAF,
            Country::CL => self::CLP,
            Country::CN => self::CNY,
            Country::CO => self::COP,
            Country::CR => self::CRC,
            Country::CU => self::CUP,
            Country::CV => self::CVE,
            Country::CZ => self::CZK,
            Country::DJ => self::DJF,
            Country::DK,
            Country::FO,
            Country::GL => self::DKK,
            Country::DO => self::DOP,
            Country::DZ => self::DZD,
            Country::EG => self::EGP,
            Country::ER => self::ERN,
            Country::ET => self::ETB,
            Country::FJ => self::FJD,
            Country::FK => self::FKP,
            Country::GB => self::GBP,
            Country::GE => self::GEL,
            Country::GH => self::GHS,
            Country::GI => self::GIP,
            Country::GM => self::GMD,
            Country::GN => self::GNF,
            Country::GT => self::GTQ,
            Country::GY => self::GYD,
            Country::HK => self::HKD,
            Country::HN => self::HNL,
            Country::HT => self::HTG,
            Country::HU => self::HUF,
            Country::ID => self::IDR,
            Country::IN => self::INR,
            Country::IL,
            Country::PS => self::ILS,
            Country::IR => self::IRR,
            Country::IS => self::ISK,
            Country::IQ => self::IQD,
            Country::JO => self::JOD,
            Country::JM => self::JMD,
            Country::JP => self::JPY,
            Country::KE => self::KES,
            Country::KG => self::KGS,
            Country::KH => self::KHR,
            Country::KM => self::KMF,
            Country::KP => self::KPW,
            Country::KR => self::KRW,
            Country::KW => self::KWD,
            Country::KY => self::KYD,
            Country::KZ => self::KZT,
            Country::LA => self::LAK,
            Country::LB => self::LBP,
            Country::LC => self::XCD,
            Country::LK => self::LKR,
            Country::LR => self::LRD,
            Country::LS => self::LSL,
            Country::LY => self::LYD,
            Country::MA => self::MAD,
            Country::MD => self::MDL,
            Country::MG => self::MGA,
            Country::MK => self::MKD,
            Country::MM => self::MMK,
            Country::MN => self::MNT,
            Country::MO => self::MOP,
            Country::MR => self::MRU,
            Country::MU => self::MUR,
            Country::MV => self::MVR,
            Country::MW => self::MWK,
            Country::MX => self::MXN,
            Country::MY => self::MYR,
            Country::MZ => self::MZN,
            Country::NA => self::NAD,
            Country::NC => self::XPF,
            Country::NG => self::NGN,
            Country::NI => self::NIO,
            Country::NO => self::NOK,
            Country::NP => self::NPR,
            Country::NZ => self::NZD,
            Country::OM => self::OMR,
            Country::PA => self::PAB,
            Country::PE => self::PEN,
            Country::PG => self::PGK,
            Country::PH => self::PHP,
            Country::PK => self::PKR,
            Country::PL => self::PLN,
            Country::PY => self::PYG,
            Country::QA => self::QAR,
            Country::RO => self::RON,
            Country::RS => self::RSD,
            Country::RU => self::RUB,
            Country::RW => self::RWF,
            Country::SA => self::SAR,
            Country::SB => self::SBD,
            Country::SD => self::SDG,
            Country::SC => self::SCR,
            Country::SE => self::SEK,
            Country::SG => self::SGD,
            Country::SO => self::SOS,
            Country::SH => self::SHP,
            Country::SL => self::SLE,
            Country::SR => self::SRD,
            Country::SS => self::SSP,
            Country::ST => self::STN,
            Country::SV => self::SVC,
            Country::SX => self::XCG,
            Country::SY => self::SYP,
            Country::SZ => self::SZL,
            Country::BJ,
            Country::BF,
            Country::CI,
            Country::GW,
            Country::ML,
            Country::NE,
            Country::SN,
            Country::TG => self::XOF,
            Country::TH => self::THB,
            Country::TJ => self::TJS,
            Country::TM => self::TMT,
            Country::TN => self::TND,
            Country::TO => self::TOP,
            Country::TR => self::TRY,
            Country::TT => self::TTD,
            Country::TW => self::TWD,
            Country::TZ => self::TZS,
            Country::UA => self::UAH,
            Country::UG => self::UGX,
            Country::EC,
            Country::TL,
            Country::VG,
            Country::US => self::USD,
            Country::UY => self::UYU,
            Country::UZ => self::UZS,
            Country::VE => self::VES,
            Country::VN => self::VND,
            Country::VU => self::VUV,
            Country::WS => self::WST,
            Country::YE => self::YER,
            Country::ZA => self::ZAR,
            Country::ZM => self::ZMW,
            Country::ZW => self::ZWL,
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
