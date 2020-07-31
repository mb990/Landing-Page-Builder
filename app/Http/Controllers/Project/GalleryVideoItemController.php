<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectGalleryVideoItemRequest;
use App\Services\ProjectGalleryVideoItemService;
use Illuminate\Http\Request;

class GalleryVideoItemController extends Controller
{
    /**
     * @var ProjectGalleryVideoItemService
     */
    private $projectGalleryVideoItemService;

    public function __construct(ProjectGalleryVideoItemService $projectGalleryVideoItemService)
    {
        $this->projectGalleryVideoItemService = $projectGalleryVideoItemService;
    }

    public function store(StoreProjectGalleryVideoItemRequest $request)
    {
        $video = $this->projectGalleryVideoItemService->store($request);

        return response()->json(['video' => $video]);
    }
}
