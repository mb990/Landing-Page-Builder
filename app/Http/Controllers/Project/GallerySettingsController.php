<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectGallerySettingsRequest;
use App\Services\GallerySettingsService;
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
     * GallerySettingsController constructor.
     * @param GallerySettingsService $gallerySettingsService
     */
    public function __construct(GallerySettingsService $gallerySettingsService)
    {
        $this->gallerySettingsService = $gallerySettingsService;
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
