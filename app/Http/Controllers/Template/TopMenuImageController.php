<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTopMenuImageRequest;
use App\Jobs\UploadImageToS3Disk;
use App\Services\TemplateImageService;
use Illuminate\Http\Request;

/**
 * Class TopMenuImageController
 * @package App\Http\Controllers\Template
 */
class TopMenuImageController extends Controller
{
    /**
     * @var TemplateImageService
     */
    private $templateImageService;

    /**
     * TopMenuImageController constructor.
     * @param TemplateImageService $templateImageService
     */
    public function __construct(TemplateImageService $templateImageService)
    {
        $this->templateImageService = $templateImageService;
    }

    /**
     * @param StoreTopMenuImageRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTopMenuImageRequest $request)
    {
        $image = $this->templateImageService->store($request);

        return response()->json(['image' => $image]);
    }
}
