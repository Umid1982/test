<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StationTransferResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'station_id' => $this->station_id,
            'station_to_id' => $this->station_to_id,
            'type' => $this->type,
            'name' => $this->name,
            'code' => $this->code,
            'icon' => $this->icon,
        ];
    }
}
