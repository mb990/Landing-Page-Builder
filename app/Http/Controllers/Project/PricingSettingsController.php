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
    public function store(StoreProjectPricingSettingsRequest $request): \Illuminate\Http\JsonResponse
    {
        $settings = $this->priceSettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }

    /**
     * @param StoreProjectPricingSettingsRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(StoreProjectPricingSettingsRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        $settings = $this->priceSettingsService->update($request, $id);

        return response()->json(['settings' => $settings]);
    }
}
