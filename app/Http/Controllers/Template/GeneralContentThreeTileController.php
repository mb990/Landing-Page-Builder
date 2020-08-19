<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGeneralContentThreeTileRequest;
use App\Services\GeneralContentThreeTileService;
use Illuminate\Http\Request;

/**
 * Class GeneralContentThreeTileController
 * @package App\Http\Controllers\Template
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
     * @param StoreGeneralContentThreeTileRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreGeneralContentThreeTileRequest $request)
    {
        $tile = $this->generalContentThreeTileService->store($request);

        return response()->json(['tile' => $tile]);
    }
}
