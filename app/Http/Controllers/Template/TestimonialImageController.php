<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplateTestimonialImageRequest;
use App\Services\TemplateImageService;
use Illuminate\Http\Request;

class TestimonialImageController extends Controller
{
    /**
     * @var TemplateImageService
     */
    private $templateImageService;

    public function __construct(TemplateImageService $templateImageService)
    {
        $this->templateImageService = $templateImageService;
    }

    public function store(StoreTemplateTestimonialImageRequest $request)
    {
        $image = $this->templateImageService->storeImage($request);

        return response()->json(['image' => $image]);
    }
}
