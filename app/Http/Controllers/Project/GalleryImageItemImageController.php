<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectGalleryImageItemImageRequest;
use App\Services\ProjectImageService;
use Illuminate\Http\Request;

/**
 * Class GalleryImageItemImageController
 * @package App\Http\Controllers\Project
 */
class GalleryImageItemImageController extends Controller
{
    /**
     * @var ProjectImageService
     */
    private $projectImageService;

    /**
     * GalleryImageItemImageController constructor.
     * @param ProjectImageService $projectImageService
     */
    public function __construct(ProjectImageService $projectImageService)
    {
        $this->projectImageService = $projectImageService;
    }

    /**
     * @param StoreProjectGalleryImageItemImageRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProjectGalleryImageItemImageRequest $request)
    {
        $image = $this->projectImageService->store($request);

        return response()->json(['image' => $image]);
    }
}
