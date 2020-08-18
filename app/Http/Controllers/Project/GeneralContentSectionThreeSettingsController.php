<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectGeneralContentThreeSettingsRequest;
use App\Services\GeneralContentThreeSettingsService;
use Illuminate\Http\Request;

class GeneralContentSectionThreeSettingsController extends Controller
{
    /**
     * @var GeneralContentThreeSettingsService
     */
    private $generalContentThreeSettingsService;

    /**
     * GeneralContentSectionThreeSettingsController constructor.
     * @param GeneralContentThreeSettingsService $generalContentThreeSettingsService
     */
    public function __construct(GeneralContentThreeSettingsService $generalContentThreeSettingsService)
    {
        $this->generalContentThreeSettingsService = $generalContentThreeSettingsService;
    }

    /**
     * @param StoreProjectGeneralContentThreeSettingsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProjectGeneralContentThreeSettingsRequest $request)
    {
        $settings = $this->generalContentThreeSettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }

    /**
     * @param StoreProjectGeneralContentThreeSettingsRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(StoreProjectGeneralContentThreeSettingsRequest $request, $id)
    {
        $settings = $this->generalContentThreeSettingsService->update($request, $id);

        return response()->json(['settings' => $settings]);
    }
}
