<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGalleryVideoItemRequest;
use App\Services\GalleryVideoItemService;
use Illuminate\Http\Request;

/**
 * Class GalleryVideoItemController
 * @package App\Http\Controllers\Template
 */
class GalleryVideoItemController extends Controller
{
    /**
     * @var GalleryVideoItemService
     */
    private $galleryVideoItemService;

    /**
     * GalleryVideoItemController constructor.
     * @param GalleryVideoItemService $galleryVideoItemService
     */
    public function __construct(GalleryVideoItemService $galleryVideoItemService)
    {
        $this->galleryVideoItemService = $galleryVideoItemService;
    }

    /**
     * @param StoreGalleryVideoItemRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreGalleryVideoItemRequest $request)
    {
        $video = $this->galleryVideoItemService->store($request);

        return response()->json(['video' => $video]);
    }
}
