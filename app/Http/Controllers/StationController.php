<?php

namespace App\Http\Controllers;

use App\Console\Constants\StationResponseEnum;
use App\Http\Requests\StationStoreRequest;
use App\Http\Requests\StationUpdateRequest;
use App\Http\Resources\StationResource;
use App\Models\Station;
use App\Services\StationService;
use Illuminate\Http\Request;

class StationController extends Controller
{
    public function __construct(protected readonly StationService $stationService)
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StationStoreRequest $stationStoreRequest)
    {
        $data = $this->stationService->stationStore($stationStoreRequest->validated());

        return response([
            'data' => StationResource::make($data->load('line')
                ->load('translations')
                ->load('transfers')
                ->load('audio')
                ->load('features')),
            'message' => StationResponseEnum::Station_CREATE,
            'success' => true,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StationUpdateRequest $stationUpdateRequest, Station $station)
    {
        $data = $this->stationService->stationUpdate($stationUpdateRequest->validated(), $station);

        return response([
            'data' => StationResource::make($data->load('line')
                ->load('translations')
                ->load('transfers')
                ->load('audio')
                ->load('features')),
            'message' => StationResponseEnum::Station_UDATE,
            'success' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Station $station)
    {
        $this->stationService->deleteStation($station);

        return response([
            'message' => StationResponseEnum::Station_DELETE,
            'success' => true,
        ]);
    }
}
