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

use PHPUnit\Framework\TestCase;

abstract class AbstractTest extends TestCase
{
    public function provider(): array
    {
        return [
            [
                [
                    'iban' => 'AD12 0001 2030 2003 5910 0100',
                    'iso_country_code' => 'AD',
                    'iban_check_digits' => 12,
                    'bban' => '0001 2030 2003 5910 0100',
                    'bank_identifier' => '0001',
                    'branch_identifier' => '2030',
                    'account_number' => '200359100100',
                    'bban_check_digits' => null,
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'AE07 0331 2345 6789 0123 456',
                    'iso_country_code' => 'AE',
                    'iban_check_digits' => 07,
                    'bban' => '0331 2345 6789 0123 456',
                    'bank_identifier' => '033',
                    'branch_identifier' => null,
                    'account_number' => '1234567890123456',
                    'bban_check_digits' => null,
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'AL47 2121 1009 0000 0002 3569 8741',
                    'iso_country_code' => 'AL',
                    'iban_check_digits' => 47,
                    'bban' => '2121 1009 0000 0002 3569 8741',
                    'bank_identifier' => '212',
                    'branch_identifier' => '1100',
                    'account_number' => '0000000235698741',
                    'bban_check_digits' => '9',
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'AT61 1904 3002 3457 3201',
                    'iso_country_code' => 'AT',
                    'iban_check_digits' => 61,
                    'bban' => '1904 3002 3457 3201',
                    'bank_identifier' => '19043',
                    'branch_identifier' => null,
                    'account_number' => '00234573201',
                    'bban_check_digits' => null,
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'AZ21 NABZ 0000 0000 1370 1000 1944',
                    'iso_country_code' => 'AZ',
                    'iban_check_digits' => 21,
                    'bban' => 'NABZ 0000 0000 1370 1000 1944',
                    'bank_identifier' => 'NABZ',
                    'branch_identifier' => null,
                    'account_number' => '00000000137010001944',
                    'bban_check_digits' => null,
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'BA39 1290 0794 0102 8494',
                    'iso_country_code' => 'BA',
                    'iban_check_digits' => 39,
                    'bban' => '1290 0794 0102 8494',
                    'bank_identifier' => '129',
                    'branch_identifier' => '007',
                    'account_number' => '94010284',
                    'bban_check_digits' => '94',
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'BE68 5390 0754 7034',
                    'iso_country_code' => 'BE',
                    'iban_check_digits' => 68,
                    'bban' => '5390 0754 7034',
                    'bank_identifier' => '539',
                    'branch_identifier' => null,
                    'account_number' => '0075470',
                    'bban_check_digits' => '34',
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'BG80 BNBG 9661 1020 3456 78',
                    'iso_country_code' => 'BG',
                    'iban_check_digits' => 80,
                    'bban' => 'BNBG 9661 1020 3456 78',
                    'bank_identifier' => 'BNBG',
                    'branch_identifier' => '9661',
                    'account_identifier' => '10',
                    'account_number' => '20345678',
                    'bban_check_digits' => null,
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'BH67 BMAG 0000 1299 1234 56',
                    'iso_country_code' => 'BH',
                    'iban_check_digits' => 67,
                    'bban' => 'BMAG 0000 1299 1234 56',
                    'bank_identifier' => 'BMAG',
                    'branch_identifier' => null,
                    'account_number' => '00001299123456',
                    'bban_check_digits' => null,
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'BR97 0036 0305 0000 1000 9795 493P 1',
                    'iso_country_code' => 'BR',
                    'iban_check_digits' => 97,
                    'bban' => '0036 0305 0000 1000 9795 493P 1',
                    'bank_identifier' => '00360305',
                    'branch_identifier' => '00001',
                    'account_number' => '0009795493',
                    'account_type' => 'P',
                    'owner_account_number' => '1',
                    'bban_check_digits' => null,
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'BY13 NBRB 3600 9000 0000 2Z00 AB00',
                    'iso_country_code' => 'BY',
                    'iban_check_digits' => 13,
                    'bban' => 'NBRB 3600 9000 0000 2Z00 AB00',
                    'bank_identifier' => 'NBRB',
                    'branch_identifier' => null,
                    'account_number' => '3600900000002Z00AB00',
                    'bban_check_digits' => null,
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'CH93 0076 2011 6238 5295 7',
                    'iso_country_code' => 'CH',
                    'iban_check_digits' => 93,
                    'bban' => '0076 2011 6238 5295 7',
                    'bank_identifier' => '00762',
                    'branch_identifier' => null,
                    'account_number' => '011623852957',
                    'bban_check_digits' => null,
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'CR05 0152 0200 1026 2840 66',
                    'iso_country_code' => 'CR',
                    'iban_check_digits' => 05,
                    'bban' => '0152 0200 1026 2840 66',
                    'bank_identifier' => '0152',
                    'branch_identifier' => null,
                    'account_number' => '02001026284066',
                    'bban_check_digits' => null,
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'CY17 0020 0128 0000 0012 0052 7600',
                    'iso_country_code' => 'CY',
                    'iban_check_digits' => 17,
                    'bban' => '0020 0128 0000 0012 0052 7600',
                    'bank_identifier' => '002',
                    'branch_identifier' => '00128',
                    'account_number' => '0000001200527600',
                    'bban_check_digits' => null,
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'CZ65 0800 0000 1920 0014 5399',
                    'iso_country_code' => 'CZ',
                    'iban_check_digits' => 65,
                    'bban' => '0800 0000 1920 0014 5399',
                    'bank_identifier' => '0800',
                    'branch_identifier' => null,
                    'account_number' => '0000192000145399',
                    'bban_check_digits' => null,
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'DE89 3704 0044 0532 0130 00',
                    'iso_country_code' => 'DE',
                    'iban_check_digits' => 89,
                    'bban' => '3704 0044 0532 0130 00',
                    'bank_identifier' => '37040044',
                    'branch_identifier' => null,
                    'account_number' => '0532013000',
                    'bban_check_digits' => null,
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'DK50 0040 0440 1162 43',
                    'iso_country_code' => 'DK',
                    'iban_check_digits' => 50,
                    'bban' => '0040 0440 1162 43',
                    'bank_identifier' => '0040',
                    'branch_identifier' => null,
                    'account_number' => '044011624',
                    'bban_check_digits' => '3',
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'DO28 BAGR 0000 0001 2124 5361 1324',
                    'iso_country_code' => 'DO',
                    'iban_check_digits' => 28,
                    'bban' => 'BAGR 0000 0001 2124 5361 1324',
                    'bank_identifier' => 'BAGR',
                    'branch_identifier' => null,
                    'account_number' => '00000001212453611324',
                    'bban_check_digits' => null,
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'EE38 2200 2210 2014 5685',
                    'iso_country_code' => 'EE',
                    'iban_check_digits' => 38,
                    'bban' => '2200 2210 2014 5685',
                    'bank_identifier' => '22',
                    'branch_identifier' => '00',
                    'account_number' => '22102014568',
                    'bban_check_digits' => '5',
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'EG80 0002 0001 5678 9012 3451 8000 2',
                    'iso_country_code' => 'EG',
                    'iban_check_digits' => 80,
                    'bban' => '0002 0001 5678 9012 3451 8000 2',
                    'bank_identifier' => '0002',
                    'branch_identifier' => '0001',
                    'account_number' => '56789012345180002',
                    'bban_check_digits' => null,
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'ES91 2100 0418 4502 0005 1332',
                    'iso_country_code' => 'ES',
                    'iban_check_digits' => 91,
                    'bban' => '2100 0418 4502 0005 1332',
                    'bank_identifier' => '2100',
                    'branch_identifier' => '0418',
                    'account_number' => '0200051332',
                    'bban_check_digits' => '45',
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'ES91 2100 0418 4502 0005 1332',
                    'iso_country_code' => 'ES',
                    'iban_check_digits' => 91,
                    'bban' => '2100 0418 4502 0005 1332',
                    'bank_identifier' => '2100',
                    'branch_identifier' => '0418',
                    'account_number' => '0200051332',
                    'bban_check_digits' => '45',
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'FI21 1234 5600 0007 85',
                    'iso_country_code' => 'FI',
                    'iban_check_digits' => 21,
                    'bban' => '1234 5600 0007 85',
                    'bank_identifier' => '123456',
                    'branch_identifier' => null,
                    'account_number' => '0000078',
                    'bban_check_digits' => '5',
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'FO62 6460 0001 6316 34',
                    'iso_country_code' => 'FO',
                    'iban_check_digits' => 62,
                    'bban' => '6460 0001 6316 34',
                    'bank_identifier' => '6460',
                    'branch_identifier' => null,
                    'account_number' => '000163163',
                    'bban_check_digits' => '4',
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'FR14 2004 1010 0505 0001 3M02 606',
                    'iso_country_code' => 'FR',
                    'iban_check_digits' => 14,
                    'bban' => '2004 1010 0505 0001 3M02 606',
                    'bank_identifier' => '20041',
                    'branch_identifier' => '01005',
                    'account_number' => '0500013M026',
                    'bban_check_digits' => '06',
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'GB29 NWBK 6016 1331 9268 19',
                    'iso_country_code' => 'GB',
                    'iban_check_digits' => 29,
                    'bban' => 'NWBK 6016 1331 9268 19',
                    'bank_identifier' => 'NWBK',
                    'branch_identifier' => '601613',
                    'account_number' => '31926819',
                    'bban_check_digits' => null,
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'GE29 NB00 0000 0101 9049 17',
                    'iso_country_code' => 'GE',
                    'iban_check_digits' => 29,
                    'bban' => 'NB00 0000 0101 9049 17',
                    'bank_identifier' => 'NB',
                    'branch_identifier' => null,
                    'account_number' => '0000000101904917',
                    'bban_check_digits' => null,
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'GI75 NWBK 0000 0000 7099 453',
                    'iso_country_code' => 'GI',
                    'iban_check_digits' => 75,
                    'bban' => 'NWBK 0000 0000 7099 453',
                    'bank_identifier' => 'NWBK',
                    'branch_identifier' => null,
                    'account_number' => '000000007099453',
                    'bban_check_digits' => null,
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'GL89 6471 0001 0002 06',
                    'iso_country_code' => 'GL',
                    'iban_check_digits' => 89,
                    'bban' => '6471 0001 0002 06',
                    'bank_identifier' => '6471',
                    'branch_identifier' => null,
                    'account_number' => '000100020',
                    'bban_check_digits' => '6',
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'GR16 0110 1250 0000 0001 2300 695',
                    'iso_country_code' => 'GR',
                    'iban_check_digits' => 16,
                    'bban' => '0110 1250 0000 0001 2300 695',
                    'bank_identifier' => '011',
                    'branch_identifier' => '0125',
                    'account_number' => '0000000012300695',
                    'bban_check_digits' => null,
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'GT82 TRAJ 0102 0000 0012 1002 9690',
                    'iso_country_code' => 'GT',
                    'iban_check_digits' => 82,
                    'bban' => 'TRAJ 0102 0000 0012 1002 9690',
                    'bank_identifier' => 'TRAJ',
                    'branch_identifier' => null,
                    'account_number' => '0000001210029690',
                    'account_type' => '02',
                    'currenty' => '01',
                    'bban_check_digits' => null,
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'HR12 1001 0051 8630 0016 0',
                    'iso_country_code' => 'HR',
                    'iban_check_digits' => 12,
                    'bban' => '1001 0051 8630 0016 0',
                    'bank_identifier' => '1001005',
                    'branch_identifier' => null,
                    'account_number' => '1863000160',
                    'bban_check_digits' => null,
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'HU42 1177 3016 1111 1018 0000 0000',
                    'iso_country_code' => 'HU',
                    'iban_check_digits' => 42,
                    'bban' => '1177 3016 1111 1018 0000 0000',
                    'bank_identifier' => '117',
                    'branch_identifier' => '7301',
                    'account_number' => '111110180000000',
                    'bban_check_digits' => '6',
                    'bban_additional_check_digits' => '0',
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'IE29 AIBK 9311 5212 3456 78',
                    'iso_country_code' => 'IE',
                    'iban_check_digits' => 29,
                    'bban' => 'AIBK 9311 5212 3456 78',
                    'bank_identifier' => 'AIBK',
                    'branch_identifier' => '931152',
                    'account_number' => '12345678',
                    'bban_check_digits' => null,
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'IL62 0108 0000 0009 9999 999',
                    'iso_country_code' => 'IL',
                    'iban_check_digits' => 62,
                    'bban' => '0108 0000 0009 9999 999',
                    'bank_identifier' => '010',
                    'branch_identifier' => '800',
                    'account_number' => '0000099999999',
                    'bban_check_digits' => null,
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'IQ20 CBIQ 8618 0010 1010 500',
                    'iso_country_code' => 'IQ',
                    'iban_check_digits' => 20,
                    'bban' => 'CBIQ 8618 0010 1010 500',
                    'bank_identifier' => 'CBIQ',
                    'branch_identifier' => '861',
                    'account_number' => '800101010500',
                    'bban_check_digits' => null,
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'IS14 0159 2600 7654 5510 7303 39',
                    'iso_country_code' => 'IS',
                    'iban_check_digits' => 14,
                    'bban' => '0159 2600 7654 5510 7303 39',
                    'bank_identifier' => '0159',
                    'branch_identifier' => '26',
                    'account_number' => '0076545510730339',
                    'bban_check_digits' => null,
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'IT60 X054 2811 1010 0000 0123 456',
                    'iso_country_code' => 'IT',
                    'iban_check_digits' => 60,
                    'bban' => 'X054 2811 1010 0000 0123 456',
                    'bank_identifier' => '05428',
                    'branch_identifier' => '11101',
                    'account_number' => '000000123456',
                    'bban_check_digits' => 'X',
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'JO94 CBJO 0010 0000 0000 0131 0003 02',
                    'iso_country_code' => 'JO',
                    'iban_check_digits' => 94,
                    'bban' => 'CBJO 0010 0000 0000 0131 0003 02',
                    'bank_identifier' => 'CBJO',
                    'branch_identifier' => '0010',
                    'account_number' => '000000000131000302',
                    'bban_check_digits' => null,
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'KW81 CBKU 0000 0000 0000 1234 5601 01',
                    'iso_country_code' => 'KW',
                    'iban_check_digits' => 81,
                    'bban' => 'CBKU 0000 0000 0000 1234 5601 01',
                    'bank_identifier' => 'CBKU',
                    'branch_identifier' => null,
                    'account_number' => '0000000000001234560101',
                    'bban_check_digits' => null,
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'KZ86 125K ZT50 0410 0100',
                    'iso_country_code' => 'KZ',
                    'iban_check_digits' => 86,
                    'bban' => '125K ZT50 0410 0100',
                    'bank_identifier' => '125',
                    'branch_identifier' => null,
                    'account_number' => 'KZT5004100100',
                    'bban_check_digits' => null,
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'LB62 0999 0000 0001 0019 0122 9114',
                    'iso_country_code' => 'LB',
                    'iban_check_digits' => 62,
                    'bban' => '0999 0000 0001 0019 0122 9114',
                    'bank_identifier' => '0999',
                    'branch_identifier' => null,
                    'account_number' => '00000001001901229114',
                    'bban_check_digits' => null,
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'LC55 HEMM 0001 0001 0012 0012 0002 3015',
                    'iso_country_code' => 'LC',
                    'iban_check_digits' => 55,
                    'bban' => 'HEMM 0001 0001 0012 0012 0002 3015',
                    'bank_identifier' => 'HEMM',
                    'branch_identifier' => null,
                    'account_number' => '000100010012001200023015',
                    'bban_check_digits' => null,
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'LI21 0881 0000 2324 013A A',
                    'iso_country_code' => 'LI',
                    'iban_check_digits' => 21,
                    'bban' => '0881 0000 2324 013A A',
                    'bank_identifier' => '08810',
                    'branch_identifier' => null,
                    'account_number' => '0002324013AA',
                    'bban_check_digits' => null,
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'LT12 1000 0111 0100 1000',
                    'iso_country_code' => 'LT',
                    'iban_check_digits' => 12,
                    'bban' => '1000 0111 0100 1000',
                    'bank_identifier' => '10000',
                    'branch_identifier' => null,
                    'account_number' => '11101001000',
                    'bban_check_digits' => null,
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'LU28 0019 4006 4475 0000',
                    'iso_country_code' => 'LU',
                    'iban_check_digits' => 28,
                    'bban' => '0019 4006 4475 0000',
                    'bank_identifier' => '001',
                    'branch_identifier' => null,
                    'account_number' => '9400644750000',
                    'bban_check_digits' => null,
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'LV80 BANK 0000 4351 9500 1',
                    'iso_country_code' => 'LV',
                    'iban_check_digits' => 80,
                    'bban' => 'BANK 0000 4351 9500 1',
                    'bank_identifier' => 'BANK',
                    'branch_identifier' => null,
                    'account_number' => '0000435195001',
                    'bban_check_digits' => null,
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'LY38 0210 0100 0000 1234 5678 9',
                    'iso_country_code' => 'LY',
                    'iban_check_digits' => 38,
                    'bban' => '0210 0100 0000 1234 5678 9',
                    'bank_identifier' => '021',
                    'branch_identifier' => '001',
                    'account_number' => '000000123456789',
                    'bban_check_digits' => null,
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'MC58 1122 2000 0101 2345 6789 030',
                    'iso_country_code' => 'MC',
                    'iban_check_digits' => 58,
                    'bban' => '1122 2000 0101 2345 6789 030',
                    'bank_identifier' => '11222',
                    'branch_identifier' => '00001',
                    'account_number' => '01234567890',
                    'bban_check_digits' => '30',
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'MD24 AG00 0225 1000 1310 4168',
                    'iso_country_code' => 'MD',
                    'iban_check_digits' => 24,
                    'bban' => 'AG00 0225 1000 1310 4168',
                    'bank_identifier' => 'AG',
                    'branch_identifier' => null,
                    'account_number' => '000225100013104168',
                    'bban_check_digits' => null,
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'ME25 5050 0001 2345 6789 51',
                    'iso_country_code' => 'ME',
                    'iban_check_digits' => 25,
                    'bban' => '5050 0001 2345 6789 51',
                    'bank_identifier' => '505',
                    'branch_identifier' => null,
                    'account_number' => '0000123456789',
                    'bban_check_digits' => '51',
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'MK07 2501 2000 0058 984',
                    'iso_country_code' => 'MK',
                    'iban_check_digits' => 07,
                    'bban' => '2501 2000 0058 984',
                    'bank_identifier' => '250',
                    'branch_identifier' => null,
                    'account_number' => '1200000589',
                    'bban_check_digits' => '84',
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'MR13 0002 0001 0100 0012 3456 753',
                    'iso_country_code' => 'MR',
                    'iban_check_digits' => 13,
                    'bban' => '0002 0001 0100 0012 3456 753',
                    'bank_identifier' => '00020',
                    'branch_identifier' => '00101',
                    'account_number' => '00001234567',
                    'bban_check_digits' => '53',
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'MT84 MALT 0110 0001 2345 MTLC AST0 01S',
                    'iso_country_code' => 'MT',
                    'iban_check_digits' => 84,
                    'bban' => 'MALT 0110 0001 2345 MTLC AST0 01S',
                    'bank_identifier' => 'MALT',
                    'branch_identifier' => '01100',
                    'account_number' => '0012345MTLCAST001S',
                    'bban_check_digits' => null,
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'MU17 BOMM 0101 1010 3030 0200 000M UR',
                    'iso_country_code' => 'MU',
                    'iban_check_digits' => 17,
                    'bban' => 'BOMM 0101 1010 3030 0200 000M UR',
                    'bank_identifier' => 'BOMM01',
                    'branch_identifier' => '01',
                    'account_number' => '101030300200',
                    'bban_check_digits' => null,
                    'reserved' => '000',
                    'currency' => 'MUR',
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'NL91 ABNA 0417 1643 00',
                    'iso_country_code' => 'NL',
                    'iban_check_digits' => 91,
                    'bban' => 'ABNA 0417 1643 00',
                    'bank_identifier' => 'ABNA',
                    'branch_identifier' => null,
                    'account_number' => '0417164300',
                    'bban_check_digits' => null,
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'NO93 8601 1117 947',
                    'iso_country_code' => 'NO',
                    'iban_check_digits' => 93,
                    'bban' => '8601 1117 947',
                    'bank_identifier' => '8601',
                    'branch_identifier' => null,
                    'account_number' => '111794',
                    'bban_check_digits' => '7',
                    'sepa_member' => true,
                ],
                [
                    'iban' => 'NO83 3000 1234 567',
                    'iso_country_code' => 'NO',
                    'iban_check_digits' => 83,
                    'bban' => '3000 1234 567',
                    'bank_identifier' => '3000',
                    'branch_identifier' => null,
                    'account_number' => '123456',
                    'bban_check_digits' => '7',
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'PK36 SCBL 0000 0011 2345 6702',
                    'iso_country_code' => 'PK',
                    'iban_check_digits' => 36,
                    'bban' => 'SCBL 0000 0011 2345 6702',
                    'bank_identifier' => 'SCBL',
                    'branch_identifier' => null,
                    'account_number' => '0000001123456702',
                    'bban_check_digits' => null,
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'PL61 1090 1014 0000 0712 1981 2874',
                    'iso_country_code' => 'PL',
                    'iban_check_digits' => 61,
                    'bban' => '1090 1014 0000 0712 1981 2874',
                    'bank_identifier' => '10901014',
                    'branch_identifier' => null,
                    'account_number' => '0000071219812874',
                    'bban_check_digits' => null,
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'PS92 PALS 0000 0000 0400 1234 5670 2',
                    'iso_country_code' => 'PS',
                    'iban_check_digits' => 92,
                    'bban' => 'PALS 0000 0000 0400 1234 5670 2',
                    'bank_identifier' => 'PALS',
                    'branch_identifier' => null,
                    'account_number' => '000000000400123456702',
                    'bban_check_digits' => null,
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'PT50 0002 0123 1234 5678 9015 4',
                    'iso_country_code' => 'PT',
                    'iban_check_digits' => 50,
                    'bban' => '0002 0123 1234 5678 9015 4',
                    'bank_identifier' => '0002',
                    'branch_identifier' => '0123',
                    'account_number' => '12345678901',
                    'bban_check_digits' => '54',
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'QA58 DOHB 0000 1234 5678 90AB CDEF G',
                    'iso_country_code' => 'QA',
                    'iban_check_digits' => 58,
                    'bban' => 'DOHB 0000 1234 5678 90AB CDEF G',
                    'bank_identifier' => 'DOHB',
                    'branch_identifier' => null,
                    'account_number' => '00001234567890ABCDEFG',
                    'bban_check_digits' => null,
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'RO49 AAAA 1B31 0075 9384 0000',
                    'iso_country_code' => 'RO',
                    'iban_check_digits' => 49,
                    'bban' => 'AAAA 1B31 0075 9384 0000',
                    'bank_identifier' => 'AAAA',
                    'branch_identifier' => null,
                    'account_number' => '1B31007593840000',
                    'bban_check_digits' => null,
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'RS35 2600 0560 1001 6113 79',
                    'iso_country_code' => 'RS',
                    'iban_check_digits' => 35,
                    'bban' => '2600 0560 1001 6113 79',
                    'bank_identifier' => '260',
                    'branch_identifier' => null,
                    'account_number' => '0056010016113',
                    'bban_check_digits' => '79',
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'SA03 8000 0000 6080 1016 7519',
                    'iso_country_code' => 'SA',
                    'iban_check_digits' => 03,
                    'bban' => '8000 0000 6080 1016 7519',
                    'bank_identifier' => '80',
                    'branch_identifier' => null,
                    'account_number' => '000000608010167519',
                    'bban_check_digits' => null,
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'SC52 BAHL 0103 1234 5678 9012 3456 USD',
                    'iso_country_code' => 'SC',
                    'iban_check_digits' => '52',
                    'bban' => 'BAHL 0103 1234 5678 9012 3456 USD',
                    'bank_identifier' => 'BAHL',
                    'branch_identifier' => '0103',
                    'account_number' => '1234567890123456',
                    'bban_check_digits' => null,
                    'currency' => 'USD',
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'SD88 1112 3456 7890 12',
                    'iso_country_code' => 'SD',
                    'iban_check_digits' => 88,
                    'bban' => '1112 3456 7890 12',
                    'bank_identifier' => '11',
                    'branch_identifier' => null,
                    'account_number' => '123456789012',
                    'bban_check_digits' => null,
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'SE45 5000 0000 0583 9825 7466',
                    'iso_country_code' => 'SE',
                    'iban_check_digits' => 45,
                    'bban' => '5000 0000 0583 9825 7466',
                    'bank_identifier' => '500',
                    'branch_identifier' => null,
                    'account_number' => '0000005839825746',
                    'bban_check_digits' => '6',
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'SI56 1910 0000 0123 438',
                    'iso_country_code' => 'SI',
                    'iban_check_digits' => 56,
                    'bban' => '1910 0000 0123 438',
                    'bank_identifier' => '19100',
                    'branch_identifier' => null,
                    'account_number' => '00001234',
                    'bban_check_digits' => '38',
                    'sepa_member' => true,
                ],
                [
                    'iban' => 'SI56 2633 0001 2039 086',
                    'iso_country_code' => 'SI',
                    'iban_check_digits' => 56,
                    'bban' => '2633 0001 2039 086',
                    'bank_identifier' => '26330',
                    'branch_identifier' => null,
                    'account_number' => '00120390',
                    'bban_check_digits' => '86',
                    'sepa_member' => true,
                ],
            ],
            [
                [
                    'iban' => 'SK31 1200 0000 1987 4263 7541',
                    'iso_country_code' => 'SK',
                    'iban_check_digits' => 31,
                    'bban' => '1200 0000 1987 4263 7541',
                    'bank_identifier' => '1200',
                    'branch_identifier' => null,
                    'account_number' => '0000198742637541',
                    'bban_check_digits' => null,
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'SM86 U032 2509 8000 0000 0270 100',
                    'iso_country_code' => 'SM',
                    'iban_check_digits' => 86,
                    'bban' => 'U032 2509 8000 0000 0270 100',
                    'bank_identifier' => '03225',
                    'branch_identifier' => '09800',
                    'account_number' => '000000270100',
                    'bban_check_digits' => 'U',
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'ST68 0001 0001 0051 8453 1011 2',
                    'iso_country_code' => 'ST',
                    'iban_check_digits' => 68,
                    'bban' => '0001 0001 0051 8453 1011 2',
                    'bank_identifier' => '0001',
                    'branch_identifier' => '0001',
                    'account_number' => '0051845310112',
                    'bban_check_digits' => null,
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'SV43 ACAT 0000 0000 0000 0012 3123',
                    'iso_country_code' => 'SV',
                    'iban_check_digits' => 43,
                    'bban' => 'ACAT 0000 0000 0000 0012 3123',
                    'bank_identifier' => 'ACAT',
                    'branch_identifier' => null,
                    'account_number' => '00000000000000123123',
                    'bban_check_digits' => null,
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'TL38 0080 0123 4567 8910 157',
                    'iso_country_code' => 'TL',
                    'iban_check_digits' => 38,
                    'bban' => '0080 0123 4567 8910 157',
                    'bank_identifier' => '008',
                    'branch_identifier' => null,
                    'account_number' => '00123456789101',
                    'bban_check_digits' => '57',
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'TN59 1000 6035 1835 9847 8831',
                    'iso_country_code' => 'TN',
                    'iban_check_digits' => 59,
                    'bban' => '1000 6035 1835 9847 8831',
                    'bank_identifier' => '10',
                    'branch_identifier' => '006',
                    'account_number' => '0351835984788',
                    'bban_check_digits' => '31',
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'TR33 0006 1005 1978 6457 8413 26',
                    'iso_country_code' => 'TR',
                    'iban_check_digits' => 33,
                    'bban' => '0006 1005 1978 6457 8413 26',
                    'bank_identifier' => '00061',
                    'branch_identifier' => '0',
                    'account_number' => '0519786457841326',
                    'bban_check_digits' => null,
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'UA90 3052 9929 9000 4149 1234 5678 9',
                    'iso_country_code' => 'UA',
                    'iban_check_digits' => 90,
                    'bban' => '3052 9929 9000 4149 1234 5678 9',
                    'bank_identifier' => '305299',
                    'branch_identifier' => null,
                    'account_number' => '2990004149123456789',
                    'bban_check_digits' => null,
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'VA59 0011 2300 0012 3456 78',
                    'iso_country_code' => 'VA',
                    'iban_check_digits' => 59,
                    'bban' => '0011 2300 0012 3456 78',
                    'bank_identifier' => '001',
                    'branch_identifier' => null,
                    'account_number' => '123000012345678',
                    'bban_check_digits' => null,
                    'sepa_member' => true,
                ]
            ],
            [
                [
                    'iban' => 'VG96 VPVG 0000 0123 4567 8901',
                    'iso_country_code' => 'VG',
                    'iban_check_digits' => 96,
                    'bban' => 'VPVG 0000 0123 4567 8901',
                    'bank_identifier' => 'VPVG',
                    'branch_identifier' => null,
                    'account_number' => '0000012345678901',
                    'bban_check_digits' => null,
                    'sepa_member' => false,
                ]
            ],
            [
                [
                    'iban' => 'XK05 1212 0123 4567 8906',
                    'iso_country_code' => 'XK',
                    'iban_check_digits' => 05,
                    'bban' => '1212 0123 4567 8906',
                    'bank_identifier' => '12',
                    'branch_identifier' => '12',
                    'account_number' => '0123456789',
                    'bban_check_digits' => '06',
                    'sepa_member' => false,
                ]
            ]
        ];
    }
}