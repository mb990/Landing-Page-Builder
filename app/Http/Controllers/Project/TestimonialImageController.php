<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectTestimonialImageRequest;
use App\Services\ProjectImageService;
use Illuminate\Http\Request;

/**
 * Class TestimonialImageController
 * @package App\Http\Controllers\Project
 */
class TestimonialImageController extends Controller
{
    /**
     * @var ProjectImageService
     */
    private $projectImageService;

    /**
     * TestimonialImageController constructor.
     * @param ProjectImageService $projectImageService
     */
    public function __construct(ProjectImageService $projectImageService)
    {
        $this->projectImageService = $projectImageService;
    }

    /**
     * @param StoreProjectTestimonialImageRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProjectTestimonialImageRequest $request)
    {
        $image = $this->projectImageService->store($request);

        return response()->json(['image' => $image]);
    }
}
