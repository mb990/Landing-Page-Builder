<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectGeneralContentSectionOneSettingsRequest;
use App\Services\GeneralContentOneSettingsService;
use Illuminate\Http\Request;

/**
 * Class GeneralContentSectionOneSettingsController
 * @package App\Http\Controllers\Project
 */
class GeneralContentSectionOneSettingsController extends Controller
{
    /**
     * @var GeneralContentOneSettingsService
     */
    private $generalContentOneSettingsService;

    /**
     * GeneralContentSectionOneSettingsController constructor.
     * @param GeneralContentOneSettingsService $generalContentOneSettingsService
     */
    public function __construct(GeneralContentOneSettingsService $generalContentOneSettingsService)
    {
        $this->generalContentOneSettingsService = $generalContentOneSettingsService;
    }

    /**
     * @param StoreProjectGeneralContentSectionOneSettingsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProjectGeneralContentSectionOneSettingsRequest $request): \Illuminate\Http\JsonResponse
    {
        $settings = $this->generalContentOneSettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }

    /**
     * @param StoreProjectGeneralContentSectionOneSettingsRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(StoreProjectGeneralContentSectionOneSettingsRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        $settings = $this->generalContentOneSettingsService->update($request, $id);

        return response()->json(['settings' => $settings]);
    }
}
