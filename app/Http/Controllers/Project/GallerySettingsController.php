<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectGallerySettingsRequest;
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

    public function store(StoreProjectGallerySettingsRequest $request)
    {
        $settings = $this->gallerySettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }
}
