<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\StoreProjectGallerySettingsRequest;
use App\Services\GallerySettingsService;
use App\Services\PageElementService;
use Illuminate\Http\Request;

/**
 * Class GallerySettingsController
 * @package App\Http\Controllers\Project
 */
class GallerySettingsController extends Controller
{
    /**
     * @var GallerySettingsService
     */
    private $gallerySettingsService;
    /**
     * @var PageElementService
     */
    private $pageElementService;

    /**
     * GallerySettingsController constructor.
     * @param GallerySettingsService $gallerySettingsService
     * @param PageElementService $pageElementService
     */
    public function __construct(GallerySettingsService $gallerySettingsService, PageElementService $pageElementService)
    {
        $this->gallerySettingsService = $gallerySettingsService;
        $this->pageElementService = $pageElementService;
    }

    /**
     * @param AuthRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(AuthRequest $request, int $id): \Illuminate\Http\JsonResponse
    {
        $settings = $this->pageElementService->find($id)->pageElementable;

        return response()->json(['settings' => $settings]);
    }

    /**
     * @param StoreProjectGallerySettingsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProjectGallerySettingsRequest $request)
    {
        $settings = $this->gallerySettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }
}
