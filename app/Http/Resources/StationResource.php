<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StationResource extends JsonResource
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
            'external_id' => $this->external_id,
            'number' => $this->number,
            'line_id' => $this->line_id,
            'name' => $this->name,
            'cross_line_id' => $this->cross_line_id,
            'cross_type' => $this->cross_type,
            'crossPlatform' => $this->crossPlatform,
            'crossPlatformColor' => $this->crossPlatformColor,
            'scheme' => $this->scheme,
            'sort' => $this->sort,
            'active' => $this->active,
            'line' => new LineResource($this->whenLoaded('line')),
            'translations' => StationTranslationResource::collection($this->whenLoaded('translations')),
            'transfers' => StationTransferResource::collection($this->whenLoaded('transfers')),
            'audio' => StationAudioResource::collection($this->whenLoaded('audio')),
            'features' => StationFeatureResource::collection($this->whenLoaded('features')),
        ];
    }
}
