<?php

declare(strict_types=1);

namespace Milenmk\LaravelLocations\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AreaResource extends JsonResource
{
    public function toArray($request): array
    {
        // Use getName() which handles fallback for models without translations
        $locale = strtoupper($request->get('locale', 'EN'));

        return [
            'id' => $this->id,
            'name' => $this->getName($locale),
            'country_id' => $this->country_id,
            'city_id' => $this->city_id,
        ];
    }
}
