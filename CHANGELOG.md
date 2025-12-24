## v1.4.0

#### Published: 2025-12-24

- [NEW] Added `activated()` scope for filtering by `is_activated` property.
- [NEW] Added `scopeByName()` to filter models by translation in a given locale, with English fallback.
- [NEW] Added `getName()` helper to retrieve model name in a given locale, with English fallback.
- [DEPRECATED] `getActive()` method is now deprecated; use `activated()` scope instead.
- [REFAC] Extracted shared functionality into `HasTranslationsAndActivation` trait (used by Country, City, Area) to reduce code duplication.
- [REFAC] Extracted `getRows()` JSON reading logic into `HasJsonRows` trait with caching and configurable paths.
- [NEW] JSON reading (`getRows()`) now caches results for 1 hour and allows optional config override of file paths.
- [UPDATE] Resources (`CountryResource`, `CityResource`, `AreaResource`) updated to dynamically return names based on requested locale.
- [ENHANCEMENT] `scopeNear()` in City model remains for proximity filtering using Haversine formula.

## v1.3.2

#### Published: 2025-08-29

- Enhance README with responsive badge links
- Adds a list of other Laravel packages to the README
- Improved DISCLAIMER in README

## v1.3.1

#### Published at: 2025-07-18

- [FIX] `Array to string conversion error` when seeding the database

## v1.3.0

#### Published at: 2025-07-18

- [NEW] Translations for countries added to the package data file
- [NEW] Migration file to add `translations` field to country datatable
- [NEW] Command to migrate only the translations for existing installations of the package
- Reworked README.md

## v1.1.0

#### Published at: 2025-03-04

- Cities now includes 5038 records
- Areas now includes 149000+ records
- [BREAKING_CHANGE] There is change of the properties for Countries, Cities and Areas

## v1.1.0

#### Published at: 2025-03-03

- Minor BUG fixes
- Improved database seeding with progress bars

## v1.0.1

#### Published at: 2025-03-03

- Updated README
- Minor BUG fixes

## v1.0.0

#### Published at: 2025-03-03

- Initial release
