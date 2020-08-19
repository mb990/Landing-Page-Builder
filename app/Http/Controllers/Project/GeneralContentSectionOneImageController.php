<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\StoreProjectGeneralContentSectionOneImagesRequest;
use App\Services\ProjectImageService;
use Illuminate\Http\Request;

/**
 * Class GeneralContentSectionOneImageController
 * @package App\Http\Controllers\Project
 */
class GeneralContentSectionOneImageController extends Controller
{
    /**
     * @var ProjectImageService
     */
    private $projectImageService;

    /**
     * GeneralContentSectionOneImageController constructor.
     * @param ProjectImageService $projectImageService
     */
    public function __construct(ProjectImageService $projectImageService)
    {
        $this->projectImageService = $projectImageService;
    }

    /**
     * @param StoreProjectGeneralContentSectionOneImagesRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProjectGeneralContentSectionOneImagesRequest $request)
    {
       $image = $this->projectImageService->store($request);

       return response()->json(['image' => $image]);
    }

    /**
     * @param AuthRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(AuthRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        $this->projectImageService->delete($id);

        return response()->json(['success' => 'image is deleted']);
    }
}
