<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectPricingSettingsBenefitRequest;
use App\Http\Requests\StoreTemplatePricingSettingsBenefitRequest;
use App\Services\PricingSettingsBenefitService;
use Illuminate\Http\Request;

/**
 * Class PricingSettingsBenefitController
 * @package App\Http\Controllers\Project
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
     * @param StoreProjectPricingSettingsBenefitRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProjectPricingSettingsBenefitRequest $request)
    {
        $benefit = $this->pricingSettingsBenefitService->store($request);

        return response()->json(['benefit' => $benefit]);
    }

    /**
     * @param StoreProjectPricingSettingsBenefitRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(StoreProjectPricingSettingsBenefitRequest $request, $id)
    {
        $benefit = $this->pricingSettingsBenefitService->update($request, $id);

        return response()->json(['benefit' => $benefit]);
    }
}
