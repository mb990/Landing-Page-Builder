<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectHeroSectionSettingsRequest;
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

    public function store(StoreProjectHeroSectionSettingsRequest $request)
    {
        $settings = $this->heroSectionSettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }
}
