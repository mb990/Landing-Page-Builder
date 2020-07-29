<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectFooterSettingsRequest;
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

    public function store(StoreProjectFooterSettingsRequest $request)
    {
        $settings = $this->footerSettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }
}
