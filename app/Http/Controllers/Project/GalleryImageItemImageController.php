<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
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

    /**
     * @param AuthRequest $request
     * @param int $id
     * @param int $elementId
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(AuthRequest $request, int $id, int $elementId): \Illuminate\Http\JsonResponse
    {
        $data = $this->projectImageService->deleteOnlyS3ItemImage($id, $elementId);

//        return response()->json(['success' => 'image is deleted']);
        return response()->json(['success' => $data]);
    }
}
