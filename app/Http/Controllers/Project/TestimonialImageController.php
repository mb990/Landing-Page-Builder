<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectTestimonialImageRequest;
use App\Services\ProjectImageService;
use Illuminate\Http\Request;

class TestimonialImageController extends Controller
{
    /**
     * @var ProjectImageService
     */
    private $projectImageService;

    public function __construct(ProjectImageService $projectImageService)
    {
        $this->projectImageService = $projectImageService;
    }

    public function store(StoreProjectTestimonialImageRequest $request)
    {
        $image = $this->projectImageService->store($request);

        return response()->json(['image' => $image]);
    }
}
