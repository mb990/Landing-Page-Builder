<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplateHeroSectionImageRequest;
use App\Services\TemplateImageService;
use Illuminate\Http\Request;

/**
 * Class HeroSectionImageController
 * @package App\Http\Controllers\Template
 */
class HeroSectionImageController extends Controller
{
    /**
     * @var TemplateImageService
     */
    private $templateImageService;

    /**
     * HeroSectionImageController constructor.
     * @param TemplateImageService $templateImageService
     */
    public function __construct(TemplateImageService $templateImageService)
    {
        $this->templateImageService = $templateImageService;
    }

    /**
     * @param StoreTemplateHeroSectionImageRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTemplateHeroSectionImageRequest $request)
    {
        $image = $this->templateImageService->store($request);

        return response()->json(['image' => $image]);
    }
}
