<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplateGeneralContentSectionOneImageRequest;
use App\Services\TemplateImageService;
use Illuminate\Http\Request;

class GeneralContentSectionOneImageController extends Controller
{
    /**
     * @var TemplateImageService
     */
    private $templateImageService;

    public function __construct(TemplateImageService $templateImageService)
    {
        $this->templateImageService = $templateImageService;
    }

    public function store(StoreTemplateGeneralContentSectionOneImageRequest $request)
    {
        $image = $this->templateImageService->storeGeneralContentOneImage($request);

        return response()->json(['image' => $image]);
    }
}
