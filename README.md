# Iban

[![Latest Version](http://img.shields.io/packagist/v/elgigi/iban.svg?style=flat-square)](https://github.com/ElGigi/Iban/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build Status](https://img.shields.io/github/workflow/status/ElGigi/Iban/Tests/main.svg?style=flat-square)](https://github.com/ElGigi/Iban/actions/workflows/tests.yml?query=branch%3Amain)
[![Codacy Grade](https://img.shields.io/codacy/grade/0390c2a60e42473098e6e738b8fda911/main.svg?style=flat-square)](https://www.codacy.com/app/ElGigi/Iban)
[![Total Downloads](https://img.shields.io/packagist/dt/elgigi/iban.svg?style=flat-square)](https://packagist.org/packages/elgigi/iban)

PHP Library to manipulate IBAN and BBAN of countries, with validation, parsing, JSON representation...

## Installation

You can install the library with [Composer](https://getcomposer.org/):

```bash
composer require elgigi/iban
```

## Usage

### Parsing

You can parse an IBAN with `Iban::parse()` method:

```php
$iban = Iban::parse('FR14 2004 1010 0505 0001 3M02 606');
```

Or a BBAN with `Bban::parse()` method:

```php
$bban = Bban::parse('2004 1010 0505 0001 3M02 606', Country::FR);
```

### IBAN and BBAN

Iban object is composed of 2 parts:

- `\ElGigi\Iban\Bban` object (representation of a BBAN)
- Check digits

`Bban` object is composed of multiple properties:

- Bank identifier
- Branch identifier [^1]
- Account number
- Check digits [^1]
- Currency [^1]
- Additional digits [^1]
- ...

[^1]: Depends on banks and countries

Both object have `format()` method to have a string representation of object.
This method accept a boolean parameter to have the "condensed" representation (without spaces).

### JSON

For IBAN, the JSON serialization give the IBAN string representation:

```json
"FR14 2004 1010 0505 0001 3M02 606"
```

For BBAN, it's little different because, we need the country to build the BBAN object again, so the JSON representation is:

```json
{
  "country": "FR",
  "bban": "2004 1010 0505 0001 3M02 606"
}
```

After is simple to use `parse()` methods of classes to build objects again.

### Validation

#### Validation of IBAN

Call `Iban::isValid():bool` method to known if IBAN is valid.

Or use `IbanValidation::validate(): bool` static method to valid an IBAN object or string representation.

Also, you can construct an IBAN from BBAN without check digits, library guess them, example:

```php
$iban = new Iban(Bban::parse('2004 1010 0505 0001 3M02 606', Country::FR));
print $iban->format(); // Output: 'FR14 2004 1010 0505 0001 3M02 606'
```

#### Validation of BBAN

Depends on banks and countries, BBAN validation is available with method `Bban::isValid()`

Or uses `BbanValidation::validate(): bool` static method to valid a BBAN object or string representation.

In case of bank haven't control on BBAN, the method return always TRUE.

### Country

An IBAN is associated to a country. A country is represented by `Country` enum.
All countries with IBAN support are listed.

You can also use helpers static methods:

- `Country::sepaMembers(): array`: list of countries SEPA members
- `Country::from(string $iso): Country`: country enum value from ISO code

Or methods with country value (FR in example):

- `Country::FR->isSepaMember(): bool`: country is SEPA member?
- `Country::FR->getCurrency(): Currency`: main currency of country
- `Country::FR->getLanguage(): Language|Language[]`: language(s) of country
- `Country::FR->getLocale(): string|string[]`: locale(s) of country
- `Country::FR->getIbanRegex(): string`: IBAN regex of country

### Language

`Language` enum is a representation of languages of countries.

To find whose countries speak a language, you can use helper method:

`Language::fr->getCountries(): Country[]`

### Currency

`Currency` enum is a representation of currency of countries.

To find whose countries have currency, you can use helper method:

`Currency::fr->getCountries(): Country[]`