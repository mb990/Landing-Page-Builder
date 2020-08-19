<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplateGalleryImageItemImageRequest;
use App\Services\TemplateImageService;
use Illuminate\Http\Request;

/**
 * Class GalleryImageItemImageController
 * @package App\Http\Controllers\Template
 */
class GalleryImageItemImageController extends Controller
{
    /**
     * @var TemplateImageService
     */
    private $templateImageService;

    /**
     * GalleryImageItemImageController constructor.
     * @param TemplateImageService $templateImageService
     */
    public function __construct(TemplateImageService $templateImageService)
    {
        $this->templateImageService = $templateImageService;
    }

    /**
     * @param StoreTemplateGalleryImageItemImageRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTemplateGalleryImageItemImageRequest $request)
    {
        $image = $this->templateImageService->store($request);

        return response()->json(['image' => $image]);
    }
}
