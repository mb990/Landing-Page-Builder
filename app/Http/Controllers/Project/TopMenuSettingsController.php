<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectTopMenuSettingsRequest;
use App\Services\TopMenuSettingsService;
use Illuminate\Http\Request;

class TopMenuSettingsController extends Controller
{
    /**
     * @var TopMenuSettingsService
     */
    private $topMenuSettingsService;

    public function __construct(TopMenuSettingsService $topMenuSettingsService)
    {
        $this->topMenuSettingsService = $topMenuSettingsService;
    }

    public function store(StoreProjectTopMenuSettingsRequest $request)
    {
        $settings = $this->topMenuSettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }
}
