<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplateGallerySettingsRequest;
use App\Services\GallerySettingsService;
use Illuminate\Http\Request;

/**
 * Class GallerySettingsController
 * @package App\Http\Controllers\Template
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
     * @param StoreTemplateGallerySettingsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTemplateGallerySettingsRequest $request)
    {
        $settings = $this->gallerySettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }
}
