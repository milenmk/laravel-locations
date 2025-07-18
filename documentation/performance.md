#### Use Eager Loading

When retrieving related models, use eager loading to avoid N+1 query problems:

```
$countries = Country::with(['cities', 'cities.areas'])->get();
```

#### Cache Common Queries

For data that doesn't change often, consider caching:

```
$countries = Cache::remember('all_countries', 60*24, function () {
    return Country::all();
});

```

#### Pagination

When displaying large datasets, use pagination:

```
$cities = City::where('country_id', $countryId)->paginate(15);
```
