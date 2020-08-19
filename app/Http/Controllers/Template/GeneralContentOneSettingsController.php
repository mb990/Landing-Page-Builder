<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplateGeneralContentOneSettingsRequest;
use App\Services\GeneralContentOneSettingsService;
use Illuminate\Http\Request;

/**
 * Class GeneralContentOneSettingsController
 * @package App\Http\Controllers\Template
 */
class GeneralContentOneSettingsController extends Controller
{
    /**
     * @var GeneralContentOneSettingsService
     */
    private $generalContentOneSettingsService;

    /**
     * GeneralContentOneSettingsController constructor.
     * @param GeneralContentOneSettingsService $generalContentOneSettingsService
     */
    public function __construct(GeneralContentOneSettingsService $generalContentOneSettingsService)
    {
        $this->generalContentOneSettingsService = $generalContentOneSettingsService;
    }

    /**
     * @param StoreTemplateGeneralContentOneSettingsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTemplateGeneralContentOneSettingsRequest $request)
    {
        $settings = $this->generalContentOneSettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }
}
