<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplateGeneralContentThreeSettingsRequest;
use App\Services\GeneralContentThreeSettingsService;

/**
 * Class GeneralContentThreeSettingsController
 * @package App\Http\Controllers\Template
 */
class GeneralContentThreeSettingsController extends Controller
{
    /**
     * @var GeneralContentThreeSettingsService
     */
    private $generalContentThreeSettingsService;

    /**
     * GeneralContentThreeSettingsController constructor.
     * @param GeneralContentThreeSettingsService $generalContentThreeSettingsService
     */
    public function __construct(GeneralContentThreeSettingsService $generalContentThreeSettingsService)
    {
        $this->generalContentThreeSettingsService = $generalContentThreeSettingsService;
    }

    /**
     * @param StoreTemplateGeneralContentThreeSettingsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTemplateGeneralContentThreeSettingsRequest $request)
    {
        $settings = $this->generalContentThreeSettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }
}
