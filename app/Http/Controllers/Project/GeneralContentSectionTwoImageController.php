<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectGeneralContentSectionTwoImageRequest;
use App\Services\ProjectImageService;
use Illuminate\Http\Request;

class GeneralContentSectionTwoImageController extends Controller
{
    /**
     * @var ProjectImageService
     */
    private $projectImageService;

    public function __construct(ProjectImageService $projectImageService)
    {
        $this->projectImageService = $projectImageService;
    }

    public function store(StoreProjectGeneralContentSectionTwoImageRequest $request)
    {
        $image = $this->projectImageService->store($request);

        return response()->json(['image' => $image]);
    }
}
