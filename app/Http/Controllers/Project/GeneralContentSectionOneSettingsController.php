<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectGeneralContentSectionOneSettingsRequest;
use App\Services\GeneralContentOneSettingsService;
use Illuminate\Http\Request;

class GeneralContentSectionOneSettingsController extends Controller
{
    /**
     * @var GeneralContentOneSettingsService
     */
    private $generalContentOneSettingsService;

    public function __construct(GeneralContentOneSettingsService $generalContentOneSettingsService)
    {
        $this->generalContentOneSettingsService = $generalContentOneSettingsService;
    }

    public function store(StoreProjectGeneralContentSectionOneSettingsRequest $request)
    {
        $settings = $this->generalContentOneSettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }
}
