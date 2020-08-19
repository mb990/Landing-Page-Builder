<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectPricingSectionRequest;
use App\Services\PricingSectionService;
use Illuminate\Http\Request;

/**
 * Class PricingSectionController
 * @package App\Http\Controllers\Project
 */
class PricingSectionController extends Controller
{
    /**
     * @var PricingSectionService
     */
    private $pricingSectionService;

    /**
     * PricingSectionController constructor.
     * @param PricingSectionService $pricingSectionService
     */
    public function __construct(PricingSectionService $pricingSectionService)
    {
        $this->pricingSectionService = $pricingSectionService;
    }

    /**
     * @param StoreProjectPricingSectionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProjectPricingSectionRequest $request)
    {
        $section = $this->pricingSectionService->store($request);

        return response()->json(['section' => $section]);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $this->pricingSectionService->delete($id);
    }
}
