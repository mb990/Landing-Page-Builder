<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplatePricingSettingsBenefitRequest;
use App\Services\PricingSettingsBenefitService;

/**
 * Class PricingSettingsBenefitController
 * @package App\Http\Controllers\Template
 */
class PricingSettingsBenefitController extends Controller
{
    /**
     * @var PricingSettingsBenefitService
     */
    private $pricingSettingsBenefitService;

    /**
     * PricingSettingsBenefitController constructor.
     * @param PricingSettingsBenefitService $pricingSettingsBenefitService
     */
    public function __construct(PricingSettingsBenefitService $pricingSettingsBenefitService)
    {
        $this->pricingSettingsBenefitService = $pricingSettingsBenefitService;
    }

    /**
     * @param StoreTemplatePricingSettingsBenefitRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTemplatePricingSettingsBenefitRequest $request)
    {
        $benefit = $this->pricingSettingsBenefitService->store($request);

        return response()->json(['benefit' => $benefit]);
    }
}
