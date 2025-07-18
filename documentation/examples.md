#### Address Form with Dependent Dropdowns

```
<form>
    <div class="form-group">
        <label for="country">Country</label>
        <select id="country" name="country_id" class="form-control">
            <option value="">Select Country</option>
            @foreach($countries as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="city">City/State</label>
        <select id="city" name="city_id" class="form-control" disabled>
            <option value="">Select City</option>
        </select>
    </div>

    <div class="form-group">
        <label for="area">Area</label>
        <select id="area" name="area_id" class="form-control" disabled>
            <option value="">Select Area</option>
        </select>
    </div>
</form>

<script>
    // JavaScript for dependent dropdowns
    document.getElementById('country').addEventListener('change', function() {
        const countryId = this.value;
        const citySelect = document.getElementById('city');

        if (countryId) {
            // Enable city dropdown and fetch cities
            citySelect.disabled = false;

            fetch(`/api/cities/${countryId}`)
                .then(response => response.json())
                .then(data => {
                    citySelect.innerHTML = '<option value="">Select City</option>';

                    Object.entries(data).forEach(([id, name]) => {
                        const option = document.createElement('option');
                        option.value = id;
                        option.textContent = name;
                        citySelect.appendChild(option);
                    });
                });
        } else {
            // Reset and disable dropdowns
            citySelect.disabled = true;
            citySelect.innerHTML = '<option value="">Select City</option>';

            const areaSelect = document.getElementById('area');
            areaSelect.disabled = true;
            areaSelect.innerHTML = '<option value="">Select Area</option>';
        }
    });

    // Similar event listener for city dropdown to load areas
</script>
```

#### Display User's Location with Flag

```
// In your controller
public function showUserProfile($userId)
{
    $user = User::with(['country', 'city', 'area'])->findOrFail($userId);
    return view('user.profile', compact('user'));
}

// In your view
@if($user->country)
    <div class="user-location">
        <img src="{{ asset('flags/' . strtolower($user->country->code) . '.svg') }}"
             alt="{{ $user->country->name }} flag"
             class="country-flag">
        {{ $user->country->name }}
        @if($user->city)
            , {{ $user->city->name }}
            @if($user->area)
                , {{ $user->area->name }}
            @endif
        @endif
    </div>
@endif
```
