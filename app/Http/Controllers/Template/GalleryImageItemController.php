<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplateGalleryImageItemRequest;
use App\Services\GalleryImageItemService;
use Illuminate\Http\Request;

/**
 * Class GalleryImageItemController
 * @package App\Http\Controllers\Template
 */
class GalleryImageItemController extends Controller
{
    /**
     * @var GalleryImageItemService
     */
    private $galleryImageItemService;

    /**
     * GalleryImageItemController constructor.
     * @param GalleryImageItemService $galleryImageItemService
     */
    public function __construct(GalleryImageItemService $galleryImageItemService)
    {
        $this->galleryImageItemService = $galleryImageItemService;
    }

    /**
     * @param StoreTemplateGalleryImageItemRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTemplateGalleryImageItemRequest $request)
    {
        $item = $this->galleryImageItemService->store($request);

        return response()->json(['item' => $item]);
    }
}
