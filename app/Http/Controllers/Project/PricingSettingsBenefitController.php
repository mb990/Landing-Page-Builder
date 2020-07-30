<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectPricingSettingsBenefitRequest;
use App\Http\Requests\StoreTemplatePricingSettingsBenefitRequest;
use App\Services\PricingSettingsBenefitService;
use Illuminate\Http\Request;

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

    public function store(StoreProjectPricingSettingsBenefitRequest $request)
    {
        $benefit = $this->pricingSettingsBenefitService->store($request);

        return response()->json(['benefit' => $benefit]);
    }
}
