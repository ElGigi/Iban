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
 * Country ISO 3166-1 alpha-2.
 */
enum Country: string
{
    case AD = 'AD';
    case AE = 'AE';
    case AF = 'AF';
    case AG = 'AG';
    case AI = 'AI';
    case AL = 'AL';
    case AM = 'AM';
    case AO = 'AO';
    case AQ = 'AQ';
    case AR = 'AR';
    case AS = 'AS';
    case AT = 'AT';
    case AU = 'AU';
    case AW = 'AW';
    case AX = 'AX';
    case AZ = 'AZ';
    case BA = 'BA';
    case BB = 'BB';
    case BD = 'BD';
    case BE = 'BE';
    case BF = 'BF';
    case BG = 'BG';
    case BH = 'BH';
    case BI = 'BI';
    case BJ = 'BJ';
    case BL = 'BL';
    case BM = 'BM';
    case BN = 'BN';
    case BO = 'BO';
    case BQ = 'BQ';
    case BR = 'BR';
    case BS = 'BS';
    case BT = 'BT';
    case BV = 'BV';
    case BW = 'BW';
    case BY = 'BY';
    case BZ = 'BZ';
    case CA = 'CA';
    case CC = 'CC';
    case CD = 'CD';
    case CF = 'CF';
    case CG = 'CG';
    case CH = 'CH';
    case CI = 'CI';
    case CK = 'CK';
    case CL = 'CL';
    case CM = 'CM';
    case CN = 'CN';
    case CO = 'CO';
    case CR = 'CR';
    case CU = 'CU';
    case CV = 'CV';
    case CW = 'CW';
    case CX = 'CX';
    case CY = 'CY';
    case CZ = 'CZ';
    case DE = 'DE';
    case DJ = 'DJ';
    case DK = 'DK';
    case DM = 'DM';
    case DO = 'DO';
    case DZ = 'DZ';
    case EC = 'EC';
    case EE = 'EE';
    case EG = 'EG';
    case EH = 'EH';
    case ER = 'ER';
    case ES = 'ES';
    case ET = 'ET';
    case FI = 'FI';
    case FJ = 'FJ';
    case FK = 'FK';
    case FM = 'FM';
    case FO = 'FO';
    case FR = 'FR';
    case GA = 'GA';
    case GB = 'GB';
    case GD = 'GD';
    case GE = 'GE';
    case GF = 'GF';
    case GG = 'GG';
    case GH = 'GH';
    case GI = 'GI';
    case GL = 'GL';
    case GM = 'GM';
    case GN = 'GN';
    case GP = 'GP';
    case GQ = 'GQ';
    case GR = 'GR';
    case GS = 'GS';
    case GT = 'GT';
    case GU = 'GU';
    case GW = 'GW';
    case GY = 'GY';
    case HK = 'HK';
    case HM = 'HM';
    case HN = 'HN';
    case HR = 'HR';
    case HT = 'HT';
    case HU = 'HU';
    case ID = 'ID';
    case IE = 'IE';
    case IL = 'IL';
    case IM = 'IM';
    case IN = 'IN';
    case IO = 'IO';
    case IQ = 'IQ';
    case IR = 'IR';
    case IS = 'IS';
    case IT = 'IT';
    case JE = 'JE';
    case JM = 'JM';
    case JO = 'JO';
    case JP = 'JP';
    case KE = 'KE';
    case KG = 'KG';
    case KH = 'KH';
    case KI = 'KI';
    case KM = 'KM';
    case KN = 'KN';
    case KP = 'KP';
    case KR = 'KR';
    case KW = 'KW';
    case KY = 'KY';
    case KZ = 'KZ';
    case LA = 'LA';
    case LB = 'LB';
    case LC = 'LC';
    case LI = 'LI';
    case LK = 'LK';
    case LR = 'LR';
    case LS = 'LS';
    case LT = 'LT';
    case LU = 'LU';
    case LV = 'LV';
    case LY = 'LY';
    case MA = 'MA';
    case MC = 'MC';
    case MD = 'MD';
    case ME = 'ME';
    case MF = 'MF';
    case MG = 'MG';
    case MH = 'MH';
    case MK = 'MK';
    case ML = 'ML';
    case MM = 'MM';
    case MN = 'MN';
    case MO = 'MO';
    case MP = 'MP';
    case MQ = 'MQ';
    case MR = 'MR';
    case MS = 'MS';
    case MT = 'MT';
    case MU = 'MU';
    case MV = 'MV';
    case MW = 'MW';
    case MX = 'MX';
    case MY = 'MY';
    case MZ = 'MZ';
    case NA = 'NA';
    case NC = 'NC';
    case NE = 'NE';
    case NF = 'NF';
    case NG = 'NG';
    case NI = 'NI';
    case NL = 'NL';
    case NO = 'NO';
    case NP = 'NP';
    case NR = 'NR';
    case NU = 'NU';
    case NZ = 'NZ';
    case OM = 'OM';
    case PA = 'PA';
    case PE = 'PE';
    case PF = 'PF';
    case PG = 'PG';
    case PH = 'PH';
    case PK = 'PK';
    case PL = 'PL';
    case PM = 'PM';
    case PN = 'PN';
    case PR = 'PR';
    case PS = 'PS';
    case PT = 'PT';
    case PW = 'PW';
    case PY = 'PY';
    case QA = 'QA';
    case RE = 'RE';
    case RO = 'RO';
    case RS = 'RS';
    case RU = 'RU';
    case RW = 'RW';
    case SA = 'SA';
    case SB = 'SB';
    case SC = 'SC';
    case SD = 'SD';
    case SE = 'SE';
    case SG = 'SG';
    case SH = 'SH';
    case SI = 'SI';
    case SJ = 'SJ';
    case SK = 'SK';
    case SL = 'SL';
    case SM = 'SM';
    case SN = 'SN';
    case SO = 'SO';
    case SR = 'SR';
    case SS = 'SS';
    case ST = 'ST';
    case SV = 'SV';
    case SX = 'SX';
    case SY = 'SY';
    case SZ = 'SZ';
    case TC = 'TC';
    case TD = 'TD';
    case TF = 'TF';
    case TG = 'TG';
    case TH = 'TH';
    case TJ = 'TJ';
    case TK = 'TK';
    case TL = 'TL';
    case TM = 'TM';
    case TN = 'TN';
    case TO = 'TO';
    case TR = 'TR';
    case TT = 'TT';
    case TV = 'TV';
    case TW = 'TW';
    case TZ = 'TZ';
    case UA = 'UA';
    case UG = 'UG';
    case UM = 'UM';
    case US = 'US';
    case UY = 'UY';
    case UZ = 'UZ';
    case VA = 'VA';
    case VC = 'VC';
    case VE = 'VE';
    case VG = 'VG';
    case VI = 'VI';
    case VN = 'VN';
    case VU = 'VU';
    case WF = 'WF';
    case WS = 'WS';
    case YE = 'YE';
    case YT = 'YT';
    case ZA = 'ZA';
    case ZM = 'ZM';
    case ZW = 'ZW';
    case XK = 'XK';

    private const SEPA_MEMBERS = [
        // Microstates and special territories
        self::AD,
        self::MC,
        self::SM,
        self::VA,
        self::GI,
        self::NC,
        // EU member states (euro and non-euro)
        self::AT,
        self::BE,
        self::BG,
        self::HR,
        self::CY,
        self::CZ,
        self::DE,
        self::DK,
        self::EE,
        self::ES,
        self::FI,
        self::FR,
        self::GR,
        self::HU,
        self::IE,
        self::IT,
        self::LT,
        self::LU,
        self::LV,
        self::MT,
        self::NL,
        self::PL,
        self::PT,
        self::RO,
        self::SE,
        self::SI,
        self::SK,
        // EFTA countries
        self::CH,
        self::IS,
        self::LI,
        self::NO,
        // UK + Crown dependencies
        self::GB,
        self::GG,
        self::JE,
        self::IM,
        // Western Balkans / candidates now in SEPA schemes
        self::AL,
        self::ME,
        self::MD,
        self::MK,
        self::RS,
    ];

    /**
     * Implemented cases.
     *
     * @return Country[]
     */
    public static function implementedCases(): array
    {
        return [
            self::AD,
            self::AE,
            self::AF,
            self::AL,
            self::AM,
            self::AO,
            self::AR,
            self::AT,
            self::AU,
            self::AW,
            self::AZ,
            self::BA,
            self::BB,
            self::BD,
            self::BE,
            self::BG,
            self::BH,
            self::BI,
            self::BM,
            self::BN,
            self::BO,
            self::BR,
            self::BS,
            self::BT,
            self::BY,
            self::BW,
            self::BZ,
            self::CA,
            self::CD,
            self::CG,
            self::CH,
            self::CL,
            self::CN,
            self::CO,
            self::CU,
            self::CR,
            self::CV,
            self::CY,
            self::CZ,
            self::DE,
            self::DJ,
            self::DK,
            self::DO,
            self::DZ,
            self::EC,
            self::EE,
            self::EG,
            self::ER,
            self::ES,
            self::ET,
            self::FI,
            self::FJ,
            self::FK,
            self::FO,
            self::FR,
            self::GB,
            self::GE,
            self::GH,
            self::GI,
            self::GL,
            self::GM,
            self::GN,
            self::GR,
            self::GT,
            self::GW,
            self::GY,
            self::HR,
            self::HK,
            self::HN,
            self::HT,
            self::HU,
            self::ID,
            self::IE,
            self::IL,
            self::IN,
            self::IQ,
            self::IR,
            self::IS,
            self::IT,
            self::JM,
            self::JO,
            self::JP,
            self::KE,
            self::KG,
            self::KH,
            self::KM,
            self::KP,
            self::KR,
            self::KY,
            self::KW,
            self::KZ,
            self::LA,
            self::LB,
            self::LC,
            self::LI,
            self::LK,
            self::LT,
            self::LR,
            self::LS,
            self::LU,
            self::LV,
            self::LY,
            self::MA,
            self::MC,
            self::MD,
            self::ME,
            self::MG,
            self::MM,
            self::MN,
            self::MO,
            self::MK,
            self::MR,
            self::MT,
            self::MU,
            self::MV,
            self::MW,
            self::MX,
            self::MY,
            self::MZ,
            self::NA,
            self::NC,
            self::NG,
            self::NI,
            self::NL,
            self::NO,
            self::NP,
            self::NZ,
            self::OM,
            self::PA,
            self::PE,
            self::PG,
            self::PH,
            self::PK,
            self::PL,
            self::PS,
            self::PT,
            self::PY,
            self::QA,
            self::RO,
            self::RS,
            self::RU,
            self::RW,
            self::SA,
            self::SB,
            self::SC,
            self::SD,
            self::SE,
            self::SG,
            self::SH,
            self::SL,
            self::SO,
            self::SI,
            self::SK,
            self::SM,
            self::SR,
            self::SS,
            self::ST,
            self::SV,
            self::SX,
            self::SY,
            self::SZ,
            self::TJ,
            self::TH,
            self::TL,
            self::TM,
            self::TN,
            self::TO,
            self::TR,
            self::TT,
            self::TW,
            self::TZ,
            self::UA,
            self::UG,
            self::US,
            self::UY,
            self::UZ,
            self::VA,
            self::VE,
            self::VG,
            self::VN,
            self::VU,
            self::WS,
            self::XK,
            self::YE,
            self::ZA,
            self::ZM,
            self::ZW,
        ];
    }

    /**
     * Get SEPA members.
     *
     * @return Country[]
     */
    public static function sepaMembers(): array
    {
        return self::SEPA_MEMBERS;
    }

    /**
     * Is implemented?
     *
     * @return bool
     */
    public function isImplemented(): bool
    {
        return in_array($this, self::implementedCases());
    }

    /**
     * Get default currency.
     *
     * @return Currency
     */
    public function getCurrency(): Currency
    {
        return Currency::country($this);
    }

    /**
     * Get language(s).
     *
     * @return Language|Language[]
     */
    public function getLanguage(): Language|array
    {
        return Language::country($this);
    }

    /**
     * Get locale(s).
     *
     * @return string|string[]
     */
    public function getLocale(): string|array
    {
        $locales = [];
        $languages = Language::country($this);
        if (!is_array($languages)) {
            $languages = [$languages];
        }

        /** @var Language $language */
        foreach ($languages as $language) {
            $locales[] = $language->name . '_' . $this->name;
        }

        if (count($locales) === 1) {
            return reset($locales);
        }

        return $locales;
    }

    /**
     * Is SEPA Member?
     *
     * @return bool
     */
    public function isSepaMember(): bool
    {
        return in_array($this, self::SEPA_MEMBERS);
    }

    /**
     * Get IBAN regex.
     *
     * @return string
     */
    public function getIbanRegex(): string
    {
        if (false === $this->isImplemented()) {
            throw new RuntimeException(sprintf('IBAN format not implemented for %s', $this->name));
        }

        $startRegex = $this->name . '[0-9]{2}';

        return $startRegex .
            match ($this) {
                self::AD => "[0-9]{8}[0-9A-Z]{12}",          // Andorra
                self::AE => "[A-Z0-9]{19}",
                self::AL => "[0-9]{8}[0-9A-Z]{16}",          // Albania
                self::AT => "[0-9]{16}",                     // Austria
                self::AZ => "[0-9A-Z]{4}[0-9]{20}",          // Azerbaijan
                self::BA => "[0-9]{16}",                     // Bosnia and Herzegovina
                self::BE => "[0-9]{12}",                     // Belgium
                self::BG => "[A-Z]{4}[0-9]{6}[0-9A-Z]{8}",   // Bulgaria
                self::BH => "[A-Z]{4}[0-9A-Z]{14}",          // Bahrain
                self::BR => "[0-9]{23}[A-Z][0-9A-Z]{1}",     // Brazil
                self::BY => "[0-9A-Z]{24}",                  // Belarus
                self::CH => "[0-9]{5}[0-9A-Z]{12}",          // Switzerland
                self::CR => "[0-9]{18}",                     // Costa Rica
                self::CY => "[0-9]{8}[0-9A-Z]{16}",          // Cyprus
                self::CZ => "[0-9]{20}",                     // Czech Republic
                self::DE => "[0-9]{18}",                     // Germany
                self::DK => "[0-9]{14}",                     // Denmark
                self::DO => "[A-Z]{4}[0-9]{20}",             // Dominican Republic
                self::EE => "[0-9]{16}",                     // Estonia
                self::EG => "[A-Z0-9]{25}",
                self::ES => "[0-9]{20}",                     // Spain
                self::FI => "[0-9]{14}",                     // Finland
                self::FO => "[0-9]{14}",                     // Faroe Islands
                self::FR,
                self::NC => "[0-9]{10}[0-9A-Z]{11}[0-9]{2}", // France, New Caledonia
                self::GB => "[A-Z]{4}[0-9]{14}",             // United Kingdom
                self::GE => "[0-9A-Z]{2}[0-9]{16}",          // Georgia
                self::GI => "[A-Z]{4}[0-9A-Z]{15}",          // Gibraltar
                self::GL => "[0-9]{14}",                     // Greenland
                self::GR => "[0-9]{7}[0-9A-Z]{16}",          // Greece
                self::GT => "[0-9A-Z]{24}",                  // Guatemala
                self::HR => "[0-9]{17}",                     // Croatia
                self::HU => "[0-9]{24}",                     // Hungary
                self::IE => "[0-9A-Z]{4}[0-9]{14}",          // Ireland
                self::IL => "[A-Z0-9]{19}",
                self::IQ => "[A-Z0-9]{19}",
                self::IS => "[0-9]{22}",                     // Iceland
                self::IT => "[A-Z][0-9]{10}[0-9A-Z]{12}",    // Italy
                self::JO => "[A-Z0-9]{26}",
                self::KW => "[A-Z0-9]{26}",
                self::KZ => "[A-Z0-9]{16}",
                self::LB => "[A-Z0-9]{24}",
                self::LC => "[A-Z0-9]{28}",
                self::LI => "[0-9]{5}[0-9A-Z]{12}",          // Liechtenstein
                self::LT => "[0-9]{16}",                     // Lithuania
                self::LU => "[A-Z0-9]{16}",
                self::LV => "[A-Z0-9]{17}",
                self::MC => "[0-9]{10}[0-9A-Z]{11}[0-9]{2}", // Monaco
                self::MD => "[A-Z0-9]{20}",
                self::ME => "[0-9]{18}",                     // Lithuania
                self::MK => "[A-Z0-9]{15}",
                self::MR => "[A-Z0-9]{23}",
                self::MT => "[A-Z0-9]{27}",
                self::MU => "[A-Z0-9]{26}",
                self::NL => "[A-Z]{4}[0-9]{10}",             // Netherlands
                self::NO => "[A-Z0-9]{11}",
                self::PK => "[A-Z0-9]{20}",
                self::PL => "[0-9]{24}",                     // Poland
                self::PS => "[A-Z0-9]{25}",
                self::PT => "[0-9]{21}",                     // Portugal
                self::QA => "[A-Z0-9]{25}",
                self::RO => "[A-Z]{4}[0-9A-Z]{16}",          // Romania
                self::RS => "[A-Z0-9]{18}",
                self::SA => "[A-Z0-9]{20}",
                self::SC => "[A-Z0-9]{27}",
                self::SE => "[0-9]{20}",                     // Sweden
                self::SI => "[A-Z0-9]{15}",
                self::SK => "[A-Z0-9]{20}",
                self::SM => "[A-Z0-9]{23}",
                self::ST => "[A-Z0-9]{21}",
                self::SV => "[A-Z0-9]{24}",
                self::TL => "[0-9]{19}",                     // East Timor
                self::TN => "[A-Z0-9]{20}",
                self::TR => "[A-Z0-9]{22}",
                self::UA => "[A-Z0-9]{25}",
                self::VG => "[A-Z0-9]{20}",
                self::XK => "[A-Z0-9]{16}",
                default => "[A-Z0-9]{10,30}",
            };
    }

    /**
     * Get BBAN format.
     *
     * @return array[array]
     * @internal
     */
    public function getBbanFormat(): array
    {
        return match ($this) {
            self::AD,
            self::EG,
            self::JO,
            self::ST => [
                'bankIdentifier' => [0, 4],
                'branchIdentifier' => [4, 4],
                'accountNumber' => [8],
                'checkDigits' => null,
            ],
            self::AE,
            self::KZ,
            self::LU,
            self::VA => [
                'bankIdentifier' => [0, 3],
                'branchIdentifier' => null,
                'accountNumber' => [3],
                'checkDigits' => null,
            ],
            self::AL => [
                'bankIdentifier' => [0, 3],
                'branchIdentifier' => [3, 4],
                'accountNumber' => [8],
                'checkDigits' => [7, 1],
            ],
            self::AT,
            self::CH,
            self::LI,
            self::LT => [
                'bankIdentifier' => [0, 5],
                'branchIdentifier' => null,
                'accountNumber' => [5],
                'checkDigits' => null,
            ],
            self::AZ,
            self::BH,
            self::BY,
            self::CR,
            self::CZ,
            self::DO,
            self::GI,
            self::KW,
            self::LB,
            self::LC,
            self::LV,
            self::NL,
            self::PK,
            self::PS,
            self::QA,
            self::RO,
            self::SK,
            self::VG,
            self::SV => [
                'bankIdentifier' => [0, 4],
                'branchIdentifier' => null,
                'accountNumber' => [4],
                'checkDigits' => null,
            ],
            self::BA => [
                'bankIdentifier' => [0, 3],
                'branchIdentifier' => [3, 3],
                'accountNumber' => [6, -2],
                'checkDigits' => [-2],
            ],
            self::BE,
            self::ME,
            self::MK,
            self::RS,
            self::TL => [
                'bankIdentifier' => [0, 3],
                'branchIdentifier' => null,
                'accountNumber' => [3, -2],
                'checkDigits' => [-2],
            ],
            self::BG => [
                'bankIdentifier' => [0, 4],
                'branchIdentifier' => [4, 4],
                'accountIdentifier' => [8, 2],
                'accountNumber' => [10],
                'checkDigits' => null,
            ],
            self::BR => [
                'bankIdentifier' => [0, 8],
                'branchIdentifier' => [8, 5],
                'accountNumber' => [13, -2],
                'checkDigits' => null,
                'accountType' => [-2, 1],
                'ownerAccountNumber' => [-1],
            ],
            self::CY => [
                'bankIdentifier' => [0, 3],
                'branchIdentifier' => [3, 5],
                'accountNumber' => [8],
                'checkDigits' => null,
            ],
            self::DE,
            self::PL => [
                'bankIdentifier' => [0, 8],
                'branchIdentifier' => null,
                'accountNumber' => [8],
                'checkDigits' => null,
            ],
            self::DK,
            self::FO,
            self::GL,
            self::NO => [
                'bankIdentifier' => [0, 4],
                'branchIdentifier' => null,
                'accountNumber' => [4, -1],
                'checkDigits' => [-1],
            ],
            self::EE => [
                'bankIdentifier' => [0, 2],
                'branchIdentifier' => [2, 2],
                'accountNumber' => [4, -1],
                'checkDigits' => [-1],
            ],
            self::ES => [
                'bankIdentifier' => [0, 4],
                'branchIdentifier' => [4, 4],
                'accountNumber' => [10],
                'checkDigits' => [8, 2],
            ],
            self::FI => [
                'bankIdentifier' => [0, 6],
                'branchIdentifier' => null,
                'accountNumber' => [6, -1],
                'checkDigits' => [-1],
            ],
            self::FR,
            self::MC,
            self::MR,
            self::NC => [
                'bankIdentifier' => [0, 5],
                'branchIdentifier' => [5, 5],
                'accountNumber' => [10, -2],
                'checkDigits' => [-2],
            ],
            self::GB,
            self::IE => [
                'bankIdentifier' => [0, 4],
                'branchIdentifier' => [4, 6],
                'accountNumber' => [10],
                'checkDigits' => null,
            ],
            self::GE,
            self::MD,
            self::SA,
            self::SD => [
                'bankIdentifier' => [0, 2],
                'branchIdentifier' => null,
                'accountNumber' => [2],
                'checkDigits' => null,
            ],
            self::GR => [
                'bankIdentifier' => [0, 3],
                'branchIdentifier' => [3, 4],
                'accountNumber' => [7],
                'checkDigits' => null,
            ],
            self::GT => [
                'bankIdentifier' => [0, 4],
                'branchIdentifier' => null,
                'accountNumber' => [8],
                'checkDigits' => null,
                'accountType' => [6, 2],
                'currency' => [4, 2],
            ],
            self::HU => [
                'bankIdentifier' => [0, 3],
                'branchIdentifier' => [3, 4],
                'accountNumber' => [8, -1],
                'checkDigits' => [7, 1],
                'additionalCheckDigits' => [-1],
            ],
            self::HR => [
                'bankIdentifier' => [0, 7],
                'branchIdentifier' => null,
                'accountNumber' => [7],
                'checkDigits' => null,
            ],
            self::IL,
            self::LY => [
                'bankIdentifier' => [0, 3],
                'branchIdentifier' => [3, 3],
                'accountNumber' => [6],
                'checkDigits' => null,
            ],
            self::IS => [
                'bankIdentifier' => [0, 4],
                'branchIdentifier' => [4, 2],
                'accountNumber' => [6],
                'checkDigits' => null,
            ],
            self::IT,
            self::SM => [
                'bankIdentifier' => [1, 5],
                'branchIdentifier' => [6, 5],
                'accountNumber' => [11],
                'checkDigits' => [0, 1],
            ],
            self::IQ => [
                'bankIdentifier' => [0, 4],
                'branchIdentifier' => [4, 3],
                'accountNumber' => [7],
                'checkDigits' => null,
            ],
            self::MT => [
                'bankIdentifier' => [0, 4],
                'branchIdentifier' => [4, 5],
                'accountNumber' => [9],
                'checkDigits' => null,
            ],
            self::MU => [
                'bankIdentifier' => [0, 6],
                'branchIdentifier' => [6, 2],
                'accountNumber' => [8, -6],
                'checkDigits' => null,
                'reserved' => [-6, 3],
                'currency' => [-3],
            ],
            self::PT => [
                'bankIdentifier' => [0, 4],
                'branchIdentifier' => [4, 4],
                'accountNumber' => [8, -2],
                'checkDigits' => [-2],
            ],
            self::SC => [
                'bankIdentifier' => [0, 4],
                'branchIdentifier' => [4, 4],
                'accountNumber' => [8, -3],
                'checkDigits' => null,
                'currency' => [-3],
            ],
            self::SE => [
                'bankIdentifier' => [0, 3],
                'branchIdentifier' => null,
                'accountNumber' => [3, -1],
                'checkDigits' => [-1],
            ],
            self::SI => [
                'bankIdentifier' => [0, 5],
                'branchIdentifier' => null,
                'accountNumber' => [5, -2],
                'checkDigits' => [-2],
            ],
            self::TN => [
                'bankIdentifier' => [0, 2],
                'branchIdentifier' => [2, 3],
                'accountNumber' => [5, -2],
                'checkDigits' => [-2],
            ],
            self::TR => [
                'bankIdentifier' => [0, 5],
                'branchIdentifier' => [5, 1],
                'accountNumber' => [6],
                'checkDigits' => null,
            ],
            self::UA => [
                'bankIdentifier' => [0, 6],
                'branchIdentifier' => null,
                'accountNumber' => [6],
                'checkDigits' => null,
            ],
            self::XK => [
                'bankIdentifier' => [0, 2],
                'branchIdentifier' => [2, 2],
                'accountNumber' => [4, -2],
                'checkDigits' => [-2],
            ],
            default => throw new RuntimeException(sprintf('BBAN format not implemented for %s', $this->name)),
        };
    }
}
