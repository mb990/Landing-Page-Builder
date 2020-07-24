<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplateGalleryImageItemRequest;
use App\Services\GalleryImageItemService;
use Illuminate\Http\Request;

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

    public function store(StoreTemplateGalleryImageItemRequest $request)
    {
        $item = $this->galleryImageItemService->store($request);

        return response()->json(['item' => $item]);
    }
}
