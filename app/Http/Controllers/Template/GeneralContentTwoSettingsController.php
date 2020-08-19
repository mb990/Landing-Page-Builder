<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplateGeneralContentTwoSettingsRequest;
use App\Services\GeneralContentTwoSettingsService;
use Illuminate\Http\Request;

/**
 * Class GeneralContentTwoSettingsController
 * @package App\Http\Controllers\Template
 */
class GeneralContentTwoSettingsController extends Controller
{
    /**
     * @var GeneralContentTwoSettingsService
     */
    private $generalContentTwoSettingsService;

    /**
     * GeneralContentTwoSettingsController constructor.
     * @param GeneralContentTwoSettingsService $generalContentTwoSettingsService
     */
    public function __construct(GeneralContentTwoSettingsService $generalContentTwoSettingsService)
    {
        $this->generalContentTwoSettingsService = $generalContentTwoSettingsService;
    }

    /**
     * @param StoreTemplateGeneralContentTwoSettingsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTemplateGeneralContentTwoSettingsRequest $request)
    {
        $settings = $this->generalContentTwoSettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }
}
