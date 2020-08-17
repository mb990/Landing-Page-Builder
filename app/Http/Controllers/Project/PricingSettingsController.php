<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePriceSettingsRequest;
use App\Http\Requests\StoreProjectPricingSettingsRequest;
use App\Services\PriceSettingsService;
use Illuminate\Http\Request;

class PricingSettingsController extends Controller
{
    /**
     * @var PriceSettingsService
     */
    private $priceSettingsService;

    /**
     * PricingSettingsController constructor.
     * @param PriceSettingsService $priceSettingsService
     */
    public function __construct(PriceSettingsService $priceSettingsService)
    {
        $this->priceSettingsService = $priceSettingsService;
    }

    /**
     * @param StoreProjectPricingSettingsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProjectPricingSettingsRequest $request)
    {
        $settings = $this->priceSettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }

    public function update(StoreProjectPricingSettingsRequest $request, $id)
    {
        $settings = $this->priceSettingsService->update($request, $id);

        return response()->json(['settings' => $settings]);
    }
}
