<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTemplateGeneralContentOneSettingsRequest;
use App\Services\GeneralContentOneSettingsService;
use Illuminate\Http\Request;

class GeneralContentOneSettingsController extends Controller
{
    /**
     * @var GeneralContentOneSettingsService
     */
    private $generalContentOneSettingsService;

    public function __construct(GeneralContentOneSettingsService $generalContentOneSettingsService)
    {
        $this->generalContentOneSettingsService = $generalContentOneSettingsService;
    }

    public function store(StoreTemplateGeneralContentOneSettingsRequest $request)
    {
        $settings = $this->generalContentOneSettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }
}
