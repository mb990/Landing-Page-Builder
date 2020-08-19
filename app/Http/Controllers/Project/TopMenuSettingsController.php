<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectTopMenuSettingsRequest;
use App\Services\TopMenuSettingsService;
use Illuminate\Http\Request;

/**
 * Class TopMenuSettingsController
 * @package App\Http\Controllers\Project
 */
class TopMenuSettingsController extends Controller
{
    /**
     * @var TopMenuSettingsService
     */
    private $topMenuSettingsService;

    /**
     * TopMenuSettingsController constructor.
     * @param TopMenuSettingsService $topMenuSettingsService
     */
    public function __construct(TopMenuSettingsService $topMenuSettingsService)
    {
        $this->topMenuSettingsService = $topMenuSettingsService;
    }

    /**
     * @param StoreProjectTopMenuSettingsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProjectTopMenuSettingsRequest $request)
    {
        $settings = $this->topMenuSettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }
}
