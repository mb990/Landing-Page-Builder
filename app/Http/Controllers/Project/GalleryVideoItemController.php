<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectGalleryVideoItemRequest;
use App\Services\ProjectGalleryVideoItemService;
use Illuminate\Http\Request;

/**
 * Class GalleryVideoItemController
 * @package App\Http\Controllers\Project
 */
class GalleryVideoItemController extends Controller
{
    /**
     * @var ProjectGalleryVideoItemService
     */
    private $projectGalleryVideoItemService;

    /**
     * GalleryVideoItemController constructor.
     * @param ProjectGalleryVideoItemService $projectGalleryVideoItemService
     */
    public function __construct(ProjectGalleryVideoItemService $projectGalleryVideoItemService)
    {
        $this->projectGalleryVideoItemService = $projectGalleryVideoItemService;
    }

    /**
     * @param StoreProjectGalleryVideoItemRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProjectGalleryVideoItemRequest $request)
    {
        $video = $this->projectGalleryVideoItemService->store($request);

        return response()->json(['video' => $video]);
    }
}
