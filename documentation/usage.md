### Basic Usage

##### Retrieving Countries

```
use Milenmk\LaravelLocations\Models\Country;

// Get all countries
$countries = Country::all();

// Get only active countries
$activeCountries = Country::where('is_activated', 1)->get();
// OR using the convenience method
$activeCountries = Country::getActive();

// Get countries with their cities
$countriesWithCities = Country::with('cities')->get();

// Find a country by code
$usa = Country::where('code', 'US')->first();
```

##### Working with Cities and Areas

```
use Milenmk\LaravelLocations\Models\Country;
use Milenmk\LaravelLocations\Models\City;
use Milenmk\LaravelLocations\Models\Area;

// Get all cities for a country
$country = Country::find(1); // United States
$cities = $country->cities;

// Get areas (sub-cities) within a city
$city = City::find(1); // e.g., New York
$areas = $city->areas;

// Get a city's country
$city = City::find(1);
$country = $city->country;

// Get an area's city and country
$area = Area::find(1);
$city = $area->city;
$country = $area->city->country;
```

##### Working with translations

```
// Countries, cities, and areas have translations stored as JSON
$country = Country::find(1);
$translations = $country->translations;

// Access a specific translation
$frenchName = $translations['FR'] ?? $country->name;
```

<br>

### Advanced Usage

##### Creating Dropdown Selects

```
// In your controller
public function createAddressForm()
{
    $countries = Country::getActive()->pluck('name', 'id');
    return view('address-form', compact('countries'));
}

// For dynamic city loading based on country selection
public function getCitiesByCountry($countryId)
{
    $cities = City::where('country_id', $countryId)
                 ->where('is_activated', 1)
                 ->pluck('name', 'id');

    return response()->json($cities);
}
```

##### Using with Eloquent Relationships

```
// Example: User model with address relationship
class User extends Model
{
    // ...

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}

// Usage
$user = User::find(1);
echo $user->country->name;
echo $user->city->name;
echo $user->area->name;
```

##### Working with Currencies

```
use Milenmk\LaravelLocations\Models\Currency;

// Get all currencies
$currencies = Currency::all();

// Get a specific currency
$euro = Currency::where('iso', 'EUR')->first();

// Access currency properties
echo $euro->symbol; // €
echo $euro->name; // Euro
echo $euro->exchange_rate; // Exchange rate relative to base currency
```

##### Filtering and Searching

```
// Search for countries by name
$searchTerm = 'united';
$countries = Country::where('name', 'LIKE', "%{$searchTerm}%")->get();

// Get countries by region
$europeanCountries = Country::where('region', 'Europe')->get();

// Get countries with specific currency
$euroCountries = Country::where('currency', 'EUR')->get();
```
