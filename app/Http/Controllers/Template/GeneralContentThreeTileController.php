<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGeneralContentThreeTileRequest;
use App\Services\GeneralContentThreeTileService;
use Illuminate\Http\Request;

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

    public function store(StoreGeneralContentThreeTileRequest $request)
    {
        $tile = $this->generalContentThreeTileService->store($request);

        return response()->json(['tile' => $tile]);
    }
}
