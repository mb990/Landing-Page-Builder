<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplateHeroSectionImageRequest;
use App\Services\TemplateImageService;
use Illuminate\Http\Request;

class HeroSectionImageController extends Controller
{
    /**
     * @var TemplateImageService
     */
    private $templateImageService;

    public function __construct(TemplateImageService $templateImageService)
    {
        $this->templateImageService = $templateImageService;
    }

    public function store(StoreTemplateHeroSectionImageRequest $request)
    {
        $image = $this->templateImageService->storeHeroSectionImage($request);

        return response()->json(['image' => $image]);
    }
}
