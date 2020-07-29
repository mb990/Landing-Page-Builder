<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectGeneralContentSectionOneImagesRequest;
use App\Services\ProjectImageService;
use Illuminate\Http\Request;

class GeneralContentOneImageController extends Controller
{
    /**
     * @var ProjectImageService
     */
    private $projectImageService;

    public function __construct(ProjectImageService $projectImageService)
    {
        $this->projectImageService = $projectImageService;
    }

    public function store(StoreProjectGeneralContentSectionOneImagesRequest $request)
    {
       $image = $this->projectImageService->store($request);

       return response()->json(['image' => $image]);
    }
}
