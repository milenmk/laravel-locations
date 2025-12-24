<?php

declare(strict_types=1);

namespace Milenmk\LaravelLocations\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    public function toArray($request): array
    {
        // Use getName() which handles fallback for models without translations
        $locale = strtoupper($request->get('locale', 'EN'));

        return [
            'id' => $this->id,
            'name' => $this->getName($locale),
            'latitude' => $this->latitude ?? null,
            'longitude' => $this->longitude ?? null,
            'country_id' => $this->country_id ?? null,
            'city_id' => $this->city_id ?? null,
            'areas' => $this->whenLoaded('areas', fn () => AreaResource::collection($this->areas ?? [])),
            'cities' => $this->whenLoaded('cities', fn () => CityResource::collection($this->cities ?? [])),
        ];
    }
}
