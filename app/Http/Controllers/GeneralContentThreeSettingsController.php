<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTemplateGeneralContentThreeSettingsRequest;
use App\Services\GeneralContentThreeSettingsService;

class GeneralContentThreeSettingsController extends Controller
{
    /**
     * @var GeneralContentThreeSettingsService
     */
    private $generalContentThreeSettingsService;

    public function __construct(GeneralContentThreeSettingsService $generalContentThreeSettingsService)
    {
        $this->generalContentThreeSettingsService = $generalContentThreeSettingsService;
    }

    public function store(StoreTemplateGeneralContentThreeSettingsRequest $request)
    {
        $settings = $this->generalContentThreeSettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }
}
