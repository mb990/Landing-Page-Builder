<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplateHeroSectionSettingsRequest;
use App\Services\HeroSectionSettingsService;
use Illuminate\Http\Request;

/**
 * Class HeroSectionSettingsController
 * @package App\Http\Controllers\Template
 */
class HeroSectionSettingsController extends Controller
{
    /**
     * @var HeroSectionSettingsService
     */
    private $heroSectionSettingsService;

    /**
     * HeroSectionSettingsController constructor.
     * @param HeroSectionSettingsService $heroSectionSettingsService
     */
    public function __construct(HeroSectionSettingsService $heroSectionSettingsService)
    {
        $this->heroSectionSettingsService = $heroSectionSettingsService;
    }

    /**
     * @param StoreTemplateHeroSectionSettingsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTemplateHeroSectionSettingsRequest $request)
    {
        $settings = $this->heroSectionSettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }
}
