<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectGeneralContentThreeTileRequest;
use App\Services\GeneralContentThreeTileService;

class GeneralContentThreeTileController extends Controller
{
    /**
     * @var GeneralContentThreeTileService
     */
    private $generalContentThreeTileService;

    public function __construct(GeneralContentThreeTileService $generalContentThreeTileService)
    {
        $this->generalContentThreeTileService = $generalContentThreeTileService;
    }

    public function store(StoreProjectGeneralContentThreeTileRequest $request)
    {
        $tile = $this->generalContentThreeTileService->store($request);

        return response()->json(['tile' => $tile]);
    }
}
