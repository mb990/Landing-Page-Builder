<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\StoreProjectHeroSectionSettingsRequest;
use App\Services\HeroSectionSettingsService;
use Illuminate\Http\Request;

/**
 * Class HeroSectionSettingsController
 * @package App\Http\Controllers\Project
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
     * @param StoreProjectHeroSectionSettingsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProjectHeroSectionSettingsRequest $request)
    {
        $settings = $this->heroSectionSettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }

    /**
     * @param StoreProjectHeroSectionSettingsRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(StoreProjectHeroSectionSettingsRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        $settings = $this->heroSectionSettingsService->update($request, $id);

        return response()->json(['settings' => $settings]);
    }
}
