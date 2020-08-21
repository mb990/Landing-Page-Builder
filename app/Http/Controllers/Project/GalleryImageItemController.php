<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\StoreProjectGalleryImageItemRequest;
use App\Services\GalleryImageItemService;

/**
 * Class GalleryImageItemController
 * @package App\Http\Controllers\Project
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
     * @param StoreProjectGalleryImageItemRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProjectGalleryImageItemRequest $request)
    {
        $item = $this->galleryImageItemService->store($request);

        return response()->json(['item' => $item]);
    }

    /**
     * @param AuthRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(AuthRequest $request, int $id): \Illuminate\Http\JsonResponse
    {
        $this->galleryImageItemService->delete($this->galleryImageItemService->getItemIdByImage($id));

        return response()->json(['success' => 'image item deleted']);
    }
}
