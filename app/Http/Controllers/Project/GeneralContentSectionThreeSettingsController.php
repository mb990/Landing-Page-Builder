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

    public function __construct(GeneralContentThreeSettingsService $generalContentThreeSettingsService)
    {
        $this->generalContentThreeSettingsService = $generalContentThreeSettingsService;
    }

    public function store(StoreProjectGeneralContentThreeSettingsRequest $request)
    {
        $settings = $this->generalContentThreeSettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }
}
