<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplateGeneralContentTwoSettingsRequest;
use App\Services\GeneralContentTwoSettingsService;
use Illuminate\Http\Request;

class GeneralContentTwoSettingsController extends Controller
{
    /**
     * @var GeneralContentTwoSettingsService
     */
    private $generalContentTwoSettingsService;

    public function __construct(GeneralContentTwoSettingsService $generalContentTwoSettingsService)
    {
        $this->generalContentTwoSettingsService = $generalContentTwoSettingsService;
    }

    public function store(StoreTemplateGeneralContentTwoSettingsRequest $request)
    {
        $settings = $this->generalContentTwoSettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }
}
