<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTemplateHeroSectionSettingsRequest;
use App\Services\HeroSectionSettingsService;
use Illuminate\Http\Request;

class HeroSectionSettingsController extends Controller
{
    /**
     * @var HeroSectionSettingsService
     */
    private $heroSectionSettingsService;

    public function __construct(HeroSectionSettingsService $heroSectionSettingsService)
    {
        $this->heroSectionSettingsService = $heroSectionSettingsService;
    }

    public function store(StoreTemplateHeroSectionSettingsRequest $request)
    {
        $settings = $this->heroSectionSettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }
}
