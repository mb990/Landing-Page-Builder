<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectHeroSectionImageRequest;
use App\Services\ProjectImageService;
use Illuminate\Http\Request;

class HeroSectionImageController extends Controller
{
    /**
     * @var ProjectImageService
     */
    private $projectImageService;

    public function __construct(ProjectImageService $projectImageService)
    {
        $this->projectImageService = $projectImageService;
    }

    public function store(StoreProjectHeroSectionImageRequest $request)
    {
        $image = $this->projectImageService->store($request);

        return response()->json(['image' => $image]);
    }
}
