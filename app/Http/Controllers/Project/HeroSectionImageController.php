<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectHeroSectionImageRequest;
use App\Services\ProjectImageService;
use Illuminate\Http\Request;

/**
 * Class HeroSectionImageController
 * @package App\Http\Controllers\Project
 */
class HeroSectionImageController extends Controller
{
    /**
     * @var ProjectImageService
     */
    private $projectImageService;

    /**
     * HeroSectionImageController constructor.
     * @param ProjectImageService $projectImageService
     */
    public function __construct(ProjectImageService $projectImageService)
    {
        $this->projectImageService = $projectImageService;
    }

    /**
     * @param StoreProjectHeroSectionImageRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProjectHeroSectionImageRequest $request)
    {
        $image = $this->projectImageService->store($request);

        return response()->json(['image' => $image]);
    }
}
