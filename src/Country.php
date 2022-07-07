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
    case AL = 'AL';
    case AT = 'AT';
    case AZ = 'AZ';
    case BA = 'BA';
    case BE = 'BE';
    case BG = 'BG';
    case BH = 'BH';
    case BR = 'BR';
    case BY = 'BY';
    case CH = 'CH';
    case CR = 'CR';
    case CY = 'CY';
    case CZ = 'CZ';
    case DE = 'DE';
    case DK = 'DK';
    case DO = 'DO';
    case EE = 'EE';
    case EG = 'EG';
    case ES = 'ES';
    case FI = 'FI';
    case FO = 'FO';
    case FR = 'FR';
    case GB = 'GB';
    case GE = 'GE';
    case GI = 'GI';
    case GL = 'GL';
    case GR = 'GR';
    case GT = 'GT';
    case HR = 'HR';
    case HU = 'HU';
    case IE = 'IE';
    case IL = 'IL';
    case IQ = 'IQ';
    case IS = 'IS';
    case IT = 'IT';
    case JO = 'JO';
    case KW = 'KW';
    case KZ = 'KZ';
    case LB = 'LB';
    case LC = 'LC';
    case LI = 'LI';
    case LT = 'LT';
    case LU = 'LU';
    case LV = 'LV';
    case LY = 'LY';
    case MC = 'MC';
    case MD = 'MD';
    case ME = 'ME';
    case MK = 'MK';
    case MR = 'MR';
    case MT = 'MT';
    case MU = 'MU';
    case NL = 'NL';
    case NO = 'NO';
    case PK = 'PK';
    case PL = 'PL';
    case PS = 'PS';
    case PT = 'PT';
    case QA = 'QA';
    case RO = 'RO';
    case RS = 'RS';
    case SA = 'SA';
    case SC = 'SC';
    case SD = 'SD';
    case SE = 'SE';
    case SI = 'SI';
    case SK = 'SK';
    case SM = 'SM';
    case ST = 'ST';
    case SV = 'SV';
    case TL = 'TL';
    case TN = 'TN';
    case TR = 'TR';
    case UA = 'UA';
    case VA = 'VA';
    case VG = 'VG';
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
     * Get SEPA members.
     *
     * @return Country[]
     */
    public static function sepaMembers(): array
    {
        return self::SEPA_MEMBERS;
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