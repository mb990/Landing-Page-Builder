<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplateTopMenuSettingsRequest;
use App\Services\TopMenuSettingsService;
use Illuminate\Http\Request;

/**
 * Class TopMenuSettingsController
 * @package App\Http\Controllers\Template
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
     * @param StoreTemplateTopMenuSettingsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTemplateTopMenuSettingsRequest $request)
    {
        $settings = $this->topMenuSettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }
}
