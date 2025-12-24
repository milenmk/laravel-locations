<?php

declare(strict_types=1);

namespace Milenmk\LaravelLocations\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
{
    public function toArray($request): array
    {
        // Determine requested locale (fallback to EN)
        $locale = strtoupper($request->get('locale', 'EN'));

        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->getName($locale),
            'currency_code' => $this->currency_code,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'cities' => $this->whenLoaded('cities', fn () => CityResource::collection($this->cities)),
        ];
    }
}
