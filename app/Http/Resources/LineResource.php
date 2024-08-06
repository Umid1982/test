<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LineResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'number' => $this->number,
            'name' => $this->name,
            'color' => $this->color,
            'style' => $this->style,
            'circular' => $this->circular,
            'external_id' => $this->external_id,
            'sort' => $this->sort,
            'stations' => StationResource::collection($this->whenLoaded('stations')),
            'translations' => LineTranslationResource::collection($this->whenLoaded('translations')),
        ];
    }
}
