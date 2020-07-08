<?php

namespace App\Http\Controllers;

use App\Services\PriceSettingsService;
use Illuminate\Http\Request;

class PriceSettingsController extends Controller
{
    /**
     * @var PriceSettingsService
     */
    private $priceSettingsService;

    public function __construct(PriceSettingsService $priceSettingsService)
    {
        $this->priceSettingsService = $priceSettingsService;
    }

    public function store(Request $request)
    {
        $settings = $this->priceSettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }
}
