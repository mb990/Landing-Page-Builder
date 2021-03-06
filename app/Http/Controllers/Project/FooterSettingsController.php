<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\StoreProjectFooterSettingsRequest;
use App\Services\FooterSettingsService;
use Illuminate\Http\Request;

/**
 * Class FooterSettingsController
 * @package App\Http\Controllers\Project
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
     * @param AuthRequest $request
     * @param string $projectSlug
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
//    public function show(AuthRequest $request, string $projectSlug, int $id)
//    {
//        $settings = $this->footerSettingsService->find($id);
//
//        return response()->json(['settings' => $settings]);
//    }

    /**
     * @param StoreProjectFooterSettingsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProjectFooterSettingsRequest $request)
    {
        $settings = $this->footerSettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }

    /**
     * @param StoreProjectFooterSettingsRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(StoreProjectFooterSettingsRequest $request, $id)
    {
        $settings = $this->footerSettingsService->update($request, $id);

        return response()->json(['settings' => $settings]);
    }
}
