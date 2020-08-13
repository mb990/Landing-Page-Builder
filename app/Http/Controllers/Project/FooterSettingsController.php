<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
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

    /**
     * @param AuthRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(AuthRequest $request, int $id)
    {
        $settings = $this->footerSettingsService->find($id);

        return response()->json(['settings' => $settings]);
    }

    /**
     * @param StoreProjectFooterSettingsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProjectFooterSettingsRequest $request)
    {
        $settings = $this->footerSettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }
}
