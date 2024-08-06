<?php

namespace App\Http\Controllers;

use App\Console\Constants\LineResponseEnum;
use App\Http\Requests\LineStoreRequest;
use App\Http\Resources\LineResource;
use App\Models\Line;
use App\Services\LineService;
use Illuminate\Http\Request;

class LineController extends Controller
{
    public function __construct(protected readonly LineService $lineService)
    {
    }

    /**
     * Display a listing of the resource.
     * @throws \Exception
     */
    public function index()
    {
        $data = $this->lineService->lineList();

        return response([
            'data' => LineResource::collection($data),
            'message' => LineResponseEnum::LINE_LIST,
            'success' => true,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LineStoreRequest $lineStoreRequest)
    {
        $data = $this->lineService->lineStore($lineStoreRequest->validated());

        return response([
            'data' => LineResource::make($data->load('stations')->load('translations')),
            'message' => LineResponseEnum::LINE_CREATE,
            'success' => true,
        ]);
    }
}
