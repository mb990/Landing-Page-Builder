<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplateGallerySettingsRequest;
use App\Services\GallerySettingsService;
use Illuminate\Http\Request;

class GallerySettingsController extends Controller
{
    /**
     * @var GallerySettingsService
     */
    private $gallerySettingsService;

    public function __construct(GallerySettingsService $gallerySettingsService)
    {
        $this->gallerySettingsService = $gallerySettingsService;
    }

    public function store(StoreTemplateGallerySettingsRequest $request)
    {
        $settings = $this->gallerySettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }
}
