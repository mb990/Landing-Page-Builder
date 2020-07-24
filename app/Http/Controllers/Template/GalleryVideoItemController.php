<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGalleryVideoItemRequest;
use App\Services\GalleryVideoItemService;
use Illuminate\Http\Request;

class GalleryVideoItemController extends Controller
{
    /**
     * @var GalleryVideoItemService
     */
    private $galleryVideoItemService;

    public function __construct(GalleryVideoItemService $galleryVideoItemService)
    {
        $this->galleryVideoItemService = $galleryVideoItemService;
    }

    public function store(StoreGalleryVideoItemRequest $request)
    {
        $video = $this->galleryVideoItemService->store($request);

        return response()->json(['video' => $video]);
    }
}
