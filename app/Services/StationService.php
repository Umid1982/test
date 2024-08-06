<?php

namespace App\Services;

use App\Models\Station;

class StationService
{
    /** @throws \Exception */

    public function stationStore($validate)
    {
        $translations = $validate['translations'];
        $transfers = $validate['transfers'];
        $audio = $validate['audio'];
        $features = $validate['features'];
        unset($validate['translations'], $validate['transfers'], $validate['audio'], $validate['features']);

        $station = Station::query()->create($validate);

        // Создание переводов для станции
        foreach ($translations as $translation) {
            $station->translations()->create($translation);
        }

        // Создание пересадок для станции
        foreach ($transfers as $transfer) {
            $station->transfers()->create($transfer);
        }

        // Создание аудиосообщений для станции
        foreach ($audio as $audioMessage) {
            $station->audio()->create($audioMessage);
        }

        // Создание сервисов для станции
        foreach ($features as $feature) {
            $station->features()->create($feature);
        }

        return $station;
    }

    public function stationUpdate($validated, Station $station)
    {
        $station->update($validated);

        // Обновление переводов станции
        foreach ($validated['translations'] as $translation) {
            $station->translations()->updateOrCreate(
                ['language_id' => $translation['language_id']],
                ['value' => $translation['value']]
            );
        }

        // Обновление пересадок станции
        foreach ($validated['transfers'] as $transfer) {
            $station->transfers()->updateOrCreate(
                ['station_to_id' => $transfer['station_to_id']],
                $transfer
            );
        }

        // Обновление аудиосообщений станции
        foreach ($validated['audio'] as $audioMessage) {
            $station->audio()->updateOrCreate(
                ['direction' => $audioMessage['direction'], 'action' => $audioMessage['action']],
                $audioMessage
            );
        }

        // Обновление сервисов станции
        foreach ($validated['features'] as $feature) {
            $station->features()->updateOrCreate(
                ['feature_id' => $feature['feature_id']],
                $feature
            );
        }

        return $station->refresh();
    }

    public function deleteStation(Station $station)
    {
        $station->load(['translations', 'transfers', 'audio', 'features']);
        $station->translations()->delete();
        $station->transfers()->delete();
        $station->audio()->delete();
        $station->features()->delete();
        // Удаление самой станции
        $station->delete();

        return true;
    }
}
