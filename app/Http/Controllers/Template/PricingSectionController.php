<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Services\PricingSectionService;
use Illuminate\Http\Request;

/**
 * Class PricingSectionController
 * @package App\Http\Controllers\Template
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
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $section = $this->pricingSectionService->store($request);

        return response()->json(['section' => $section]);
    }
}
