<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFooterSettingsRequest;
use App\Services\FooterSettingsService;
use Illuminate\Http\Request;

/**
 * Class FooterSettingsController
 * @package App\Http\Controllers\Template
 */
class FooterSettingsController extends Controller
{
    /**
     * @var FooterSettingsService
     */
    private $footerSettingsService;

    /**
     * FooterSettingsController constructor.
     * @param FooterSettingsService $footerSettingsService
     */
    public function __construct(FooterSettingsService $footerSettingsService)
    {
        $this->footerSettingsService = $footerSettingsService;
    }

    /**
     * @param StoreFooterSettingsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreFooterSettingsRequest $request)
    {
        $settings = $this->footerSettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }
}
