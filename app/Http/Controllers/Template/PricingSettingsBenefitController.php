<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplatePricingSettingsBenefitRequest;
use App\Services\PricingSettingsBenefitService;

class PricingSettingsBenefitController extends Controller
{
    /**
     * @var PricingSettingsBenefitService
     */
    private $pricingSettingsBenefitService;

    public function __construct(PricingSettingsBenefitService $pricingSettingsBenefitService)
    {
        $this->pricingSettingsBenefitService = $pricingSettingsBenefitService;
    }

    public function store(StoreTemplatePricingSettingsBenefitRequest $request)
    {
        $benefit = $this->pricingSettingsBenefitService->store($request);

        return response()->json(['benefit' => $benefit]);
    }
}
