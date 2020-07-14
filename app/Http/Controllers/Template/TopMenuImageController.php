<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTopMenuImageRequest;
use App\Services\TemplateImageService;
use Illuminate\Http\Request;

class TopMenuImageController extends Controller
{
    /**
     * @var TemplateImageService
     */
    private $templateImageService;

    public function __construct(TemplateImageService $templateImageService)
    {
        $this->templateImageService = $templateImageService;
    }

    public function store(StoreTopMenuImageRequest $request)
    {
        $image = $this->templateImageService->store($request);

        return response()->json(['image' => $image]);
    }
}
