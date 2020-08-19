<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplateGeneralContentSectionTwoImageRequest;
use App\Services\TemplateImageService;
use Illuminate\Http\Request;

/**
 * Class GeneralContentSectionTwoImageController
 * @package App\Http\Controllers\Template
 */
class GeneralContentSectionTwoImageController extends Controller
{
    /**
     * @var TemplateImageService
     */
    private $templateImageService;

    /**
     * GeneralContentSectionTwoImageController constructor.
     * @param TemplateImageService $templateImageService
     */
    public function __construct(TemplateImageService $templateImageService)
    {
        $this->templateImageService = $templateImageService;
    }

    /**
     * @param StoreTemplateGeneralContentSectionTwoImageRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTemplateGeneralContentSectionTwoImageRequest $request)
    {
        $image = $this->templateImageService->store($request);

        return response()->json(['image' => $image]);
    }
}
