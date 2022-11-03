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
        self::AD,
        self::AT,
        self::BE,
        self::BG,
        self::CH,
        self::CY,
        self::CZ,
        self::DE,
        self::DK,
        self::EE,
        self::ES,
        self::FI,
        self::FR,
        self::GB,
        self::GI,
        self::GR,
        self::HR,
        self::HU,
        self::IE,
        self::IS,
        self::IT,
        self::LI,
        self::LT,
        self::LU,
        self::LV,
        self::MC,
        self::MT,
        self::NL,
        self::NO,
        self::PL,
        self::PT,
        self::RO,
        self::SE,
        self::SI,
        self::SK,
        self::SM,
        self::VA,
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
            self::AL,
            self::AT,
            self::AZ,
            self::BA,
            self::BE,
            self::BG,
            self::BH,
            self::BR,
            self::BY,
            self::CH,
            self::CR,
            self::CY,
            self::CZ,
            self::DE,
            self::DK,
            self::DO,
            self::EE,
            self::EG,
            self::ES,
            self::FI,
            self::FO,
            self::FR,
            self::GB,
            self::GE,
            self::GI,
            self::GL,
            self::GR,
            self::GT,
            self::HR,
            self::HU,
            self::IE,
            self::IL,
            self::IQ,
            self::IS,
            self::IT,
            self::JO,
            self::KW,
            self::KZ,
            self::LB,
            self::LC,
            self::LI,
            self::LT,
            self::LU,
            self::LV,
            self::LY,
            self::MC,
            self::MD,
            self::ME,
            self::MK,
            self::MR,
            self::MT,
            self::MU,
            self::NL,
            self::NO,
            self::PK,
            self::PL,
            self::PS,
            self::PT,
            self::QA,
            self::RO,
            self::RS,
            self::SA,
            self::SC,
            self::SD,
            self::SE,
            self::SI,
            self::SK,
            self::SM,
            self::ST,
            self::SV,
            self::TL,
            self::TN,
            self::TR,
            self::UA,
            self::VA,
            self::VG,
            self::XK,
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
                self::ES => "[0-9]{20}",                     // Spain
                self::FI => "[0-9]{14}",                     // Finland
                self::FO => "[0-9]{14}",                     // Faroe Islands
                self::FR => "[0-9]{10}[0-9A-Z]{11}[0-9]{2}", // France
                self::GB => "[A-Z]{4}[0-9]{14}",             // United Kingdom
                self::GI => "[A-Z]{4}[0-9A-Z]{15}",          // Gibraltar
                self::GL => "[0-9]{14}",                     // Greenland
                self::GR => "[0-9]{7}[0-9A-Z]{16}",          // Greece
                self::GT => "[0-9A-Z]{24}",                  // Guatemala
                self::HU => "[0-9]{24}",                     // Hungary
                self::HR => "[0-9]{17}",                     // Croatia
                self::IE => "[0-9A-Z]{4}[0-9]{14}",          // Ireland
                self::IS => "[0-9]{22}",                     // Iceland
                self::IT => "[A-Z][0-9]{10}[0-9A-Z]{12}",    // Italy
                self::LI => "[0-9]{5}[0-9A-Z]{12}",          // Liechtenstein
                self::LT => "[0-9]{16}",                     // Lithuania
                self::ME => "[0-9]{18}",                     // Lithuania
                self::MC => "[0-9]{10}[0-9A-Z]{11}[0-9]{2}", // Monaco
                self::NL => "[A-Z]{4}[0-9]{10}",             // Netherlands
                self::PL => "[0-9]{24}",                     // Poland
                self::PT => "[0-9]{21}",                     // Portugal
                self::RO => "[A-Z]{4}[0-9A-Z]{16}",          // Romania
                self::SE => "[0-9]{20}",                     // Sweden
                self::TL => "[0-9]{19}",                     // East Timor
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
            self::MR => [
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