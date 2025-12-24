# Examples

### Country Dropdown for Forms

```php
use Milenmk\Locations\Models\Country;

// Populate a dropdown in English
$countries = Country::activated()->orderBy('translations->EN')->get();
foreach ($countries as $country) {
    echo "<option value='{$country->id}'>{$country->getName()}</option>";
}
```

### Country → City → Area Dynamic Selects

```php
use Milenmk\Locations\Models\Country;
use Milenmk\Locations\Models\City;
use Milenmk\Locations\Models\Area;

$country = Country::activated()->first();
$cities = $country->cities()->activated()->get();

$city = $cities->first();
$areas = $city->areas()->activated()->get();

```

### Proximity Search for Cities

```php
use Milenmk\Locations\Models\City;

// Latitude/Longitude for Berlin
$nearbyCities = City::activated()->near(52.52, 13.405, 50)->get();

```

### JSON Data Usage

```php
$countries = (new Country)->getRows();
$cities = (new City)->getRows();
$areas = (new Area)->getRows();

```
