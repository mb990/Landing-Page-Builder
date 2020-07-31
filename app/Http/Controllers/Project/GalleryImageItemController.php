<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectGalleryImageItemRequest;
use App\Services\GalleryImageItemService;

class GalleryImageItemController extends Controller
{
    /**
     * @var GalleryImageItemService
     */
    private $galleryImageItemService;

    public function __construct(GalleryImageItemService $galleryImageItemService)
    {
        $this->galleryImageItemService = $galleryImageItemService;
    }

    public function store(StoreProjectGalleryImageItemRequest $request)
    {
        $item = $this->galleryImageItemService->store($request);

        return response()->json(['item' => $item]);
    }
}
