# Performance

Laravel Locations includes large datasets for production usage.

### Recommendations

- Use `activated()` scope to limit queries to active records.
- Use `getRows()` if you want to load data from JSON files instead of querying the database for faster performance in read-heavy operations.
- Cache results from `getRows()` or queries when repeatedly used in forms or APIs.
- Only load relations when needed (`cities`, `areas`) using `with()` or `whenLoaded()` in resources.

### Example

```php
use Milenmk\Locations\Models\Country;

$countries = Country::activated()->with('cities')->get(); // Only load active countries with their cities
```

For dynamic selects and forms, use `getName($locale)` to avoid extra joins or queries for translation data.

#### Pagination

When displaying large datasets, use pagination:

```
$cities = City::where('country_id', $countryId)->paginate(15);
```
