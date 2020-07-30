<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectGeneralContentSectionTwoSettingsRequest;
use App\Services\GeneralContentTwoSettingsService;
use Illuminate\Http\Request;

class GeneralContentSectionTwoSettingsController extends Controller
{
    /**
     * @var GeneralContentTwoSettingsService
     */
    private $generalContentTwoSettingsService;

    public function __construct(GeneralContentTwoSettingsService $generalContentTwoSettingsService)
    {
        $this->generalContentTwoSettingsService = $generalContentTwoSettingsService;
    }

    public function store(StoreProjectGeneralContentSectionTwoSettingsRequest $request)
    {
        $settings = $this->generalContentTwoSettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }
}
