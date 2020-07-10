<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFooterSettingsRequest;
use App\Services\FooterSettingsService;
use Illuminate\Http\Request;

class FooterSettingsController extends Controller
{
    /**
     * @var FooterSettingsService
     */
    private $footerSettingsService;

    public function __construct(FooterSettingsService $footerSettingsService)
    {
        $this->footerSettingsService = $footerSettingsService;
    }

    public function store(StoreFooterSettingsRequest $request)
    {
        $settings = $this->footerSettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }
}
