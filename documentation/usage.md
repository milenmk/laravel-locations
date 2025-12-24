# Usage

This document explains how to use the Laravel Locations package in your application.

## Accessing Models

All models include common functionality for translations and activation:

- `activated()` scope: filters only activated records
- `scopeByName($term, $locale = 'EN')`: filter by name with dynamic locale
- `getName($locale = 'EN')`: get the translated name, fallback to English
- `getRows()`: retrieve data from JSON files with caching

### Examples

```php
use Milenmk\Locations\Models\Country;

// Get all active countries
$countries = Country::activated()->get();

// Filter by name in a specific language
$germany = Country::byName('Allemagne', 'FR')->first();

// Get name with fallback
echo $germany->getName('FR'); // returns 'Germany' if French missing

// Read data directly from JSON without DB
$countriesData = (new Country)->getRows();
```

### Relations

```php
Country->cities()
City->country()
City->areas()
```
