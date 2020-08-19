<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplateGeneralContentSectionOneImageRequest;
use App\Services\TemplateImageService;
use Illuminate\Http\Request;

/**
 * Class GeneralContentSectionOneImageController
 * @package App\Http\Controllers\Template
 */
class GeneralContentSectionOneImageController extends Controller
{
    /**
     * @var TemplateImageService
     */
    private $templateImageService;

    /**
     * GeneralContentSectionOneImageController constructor.
     * @param TemplateImageService $templateImageService
     */
    public function __construct(TemplateImageService $templateImageService)
    {
        $this->templateImageService = $templateImageService;
    }

    /**
     * @param StoreTemplateGeneralContentSectionOneImageRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTemplateGeneralContentSectionOneImageRequest $request)
    {
        $image = $this->templateImageService->store($request);

        return response()->json(['image' => $image]);
    }
}
