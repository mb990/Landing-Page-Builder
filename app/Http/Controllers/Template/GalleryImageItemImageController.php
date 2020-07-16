<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplateGalleryImageItemImageRequest;
use App\Services\TemplateImageService;
use Illuminate\Http\Request;

class GalleryImageItemImageController extends Controller
{
    /**
     * @var TemplateImageService
     */
    private $templateImageService;

    public function __construct(TemplateImageService $templateImageService)
    {
        $this->templateImageService = $templateImageService;
    }

    public function store(StoreTemplateGalleryImageItemImageRequest $request)
    {
        $image = $this->templateImageService->storeGalleryImageItemImage($request);

        return response()->json(['image' => $image]);
    }
}
