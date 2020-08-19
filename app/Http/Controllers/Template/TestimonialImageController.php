<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplateTestimonialImageRequest;
use App\Services\TemplateImageService;
use Illuminate\Http\Request;

/**
 * Class TestimonialImageController
 * @package App\Http\Controllers\Template
 */
class TestimonialImageController extends Controller
{
    /**
     * @var TemplateImageService
     */
    private $templateImageService;

    /**
     * TestimonialImageController constructor.
     * @param TemplateImageService $templateImageService
     */
    public function __construct(TemplateImageService $templateImageService)
    {
        $this->templateImageService = $templateImageService;
    }

    /**
     * @param StoreTemplateTestimonialImageRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTemplateTestimonialImageRequest $request)
    {
        $image = $this->templateImageService->store($request);

        return response()->json(['image' => $image]);
    }
}
