<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePriceSettingsRequest;
use App\Services\PriceSettingsService;
use Illuminate\Http\Request;

/**
 * Class PriceSettingsController
 * @package App\Http\Controllers\Template
 */
class PriceSettingsController extends Controller
{
    /**
     * @var PriceSettingsService
     */
    private $priceSettingsService;

    /**
     * PriceSettingsController constructor.
     * @param PriceSettingsService $priceSettingsService
     */
    public function __construct(PriceSettingsService $priceSettingsService)
    {
        $this->priceSettingsService = $priceSettingsService;
    }

    /**
     * @param StorePriceSettingsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StorePriceSettingsRequest $request)
    {
        $settings = $this->priceSettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }
}
