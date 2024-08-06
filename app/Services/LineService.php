<?php

namespace App\Services;

use App\Models\Line;

class LineService
{
    /** @throws \Exception */

    public function lineList(): \Illuminate\Database\Eloquent\Collection|array
    {
        return Line::with(['stations.transfers', 'stations.audio', 'stations.features', 'translations'])
            ->orderBy('name')
            ->get();
    }

    public function lineStore($validate): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Builder
    {
        $line = Line::query()->create($validate);

        foreach ($validate['translations'] as $translation) {
            $line->translations()->create($translation);
        }

        return $line;
    }
}
