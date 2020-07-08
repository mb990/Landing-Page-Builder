<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        $benefit = $this->pricingSettingsBenefitService->store($request);

        return response()->json(['benefit' => $benefit]);
    }
}
