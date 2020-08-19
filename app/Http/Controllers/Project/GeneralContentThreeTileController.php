<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectGeneralContentThreeTileRequest;
use App\Services\GeneralContentThreeTileService;

/**
 * Class GeneralContentThreeTileController
 * @package App\Http\Controllers\Project
 */
class GeneralContentThreeTileController extends Controller
{
    /**
     * @var GeneralContentThreeTileService
     */
    private $generalContentThreeTileService;

    /**
     * GeneralContentThreeTileController constructor.
     * @param GeneralContentThreeTileService $generalContentThreeTileService
     */
    public function __construct(GeneralContentThreeTileService $generalContentThreeTileService)
    {
        $this->generalContentThreeTileService = $generalContentThreeTileService;
    }

    /**
     * @param StoreProjectGeneralContentThreeTileRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProjectGeneralContentThreeTileRequest $request)
    {
        $tile = $this->generalContentThreeTileService->store($request);

        return response()->json(['tile' => $tile]);
    }

    /**
     * @param StoreProjectGeneralContentThreeTileRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(StoreProjectGeneralContentThreeTileRequest $request, $id)
    {
        $tile = $this->generalContentThreeTileService->update($request, $id);

        return response()->json(['tile' => $tile]);
    }
}
