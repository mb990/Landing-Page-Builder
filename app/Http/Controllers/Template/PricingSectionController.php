<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Services\PricingSectionService;
use Illuminate\Http\Request;

class PricingSectionController extends Controller
{
    /**
     * @var PricingSectionService
     */
    private $pricingSectionService;

    public function __construct(PricingSectionService $pricingSectionService)
    {
        $this->pricingSectionService = $pricingSectionService;
    }

    public function store(Request $request)
    {
        $section = $this->pricingSectionService->store($request);

        return response()->json(['section' => $section]);
    }
}
