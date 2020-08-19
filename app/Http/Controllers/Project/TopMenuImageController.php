<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectTopMenuImageRequest;
use App\Services\ProjectImageService;
use Illuminate\Http\Request;

/**
 * Class TopMenuImageController
 * @package App\Http\Controllers\Project
 */
class TopMenuImageController extends Controller
{
    /**
     * @var ProjectImageService
     */
    private $projectImageService;

    /**
     * TopMenuImageController constructor.
     * @param ProjectImageService $projectImageService
     */
    public function __construct(ProjectImageService $projectImageService)
    {
        $this->projectImageService = $projectImageService;
    }

    /**
     * @param StoreProjectTopMenuImageRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProjectTopMenuImageRequest $request)
    {
        $image = $this->projectImageService->store($request);

        return response()->json(['image' => $image]);
    }
}
