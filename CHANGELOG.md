# Change Log

All notable changes to this project will be documented in this file. This project adheres
to [Semantic Versioning] (http://semver.org/). For change log format,
use [Keep a Changelog] (http://keepachangelog.com/).

## [1.2.0] - 2025-12-01

### Added

- New implementation of countries

### Changed

- Update implementation of some countries

## [1.1.0] - 2023-07-18

### Added

- New country NC (thanks @JDakkers)

## [1.0.1] - 2022-12-19

### Fixed

- GE iban regex

## [1.0.0] - 2022-12-19

No change since the last release

## [1.0.0-beta5] - 2022-12-15

### Added

- All missing IBAN formats

## [1.0.0-beta4] - 2022-12-13

### Added

- All missing countries code, who throw exception on certain functionalities

### Fixed

- BBAN not validated for IBAN validation

## [1.0.0-beta3] - 2022-08-17

### Changed

- Guess check digits for BBAN with missing check digits

## [1.0.0-beta2] - 2022-07-12

### Added

- New methods `Iban::tryParse()` and `Bban::tryParse()`
- New method `Bban::generateIban()`

## Changed

- Change enum to backed string enum

## [1.0.0-beta1] - 2022-03-15

Initial development
