<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\StoreProjectGeneralContentSectionTwoImageRequest;
use App\Services\ProjectImageService;
use Illuminate\Http\Request;

/**
 * Class GeneralContentSectionTwoImageController
 * @package App\Http\Controllers\Project
 */
class GeneralContentSectionTwoImageController extends Controller
{
    /**
     * @var ProjectImageService
     */
    private $projectImageService;

    /**
     * GeneralContentSectionTwoImageController constructor.
     * @param ProjectImageService $projectImageService
     */
    public function __construct(ProjectImageService $projectImageService)
    {
        $this->projectImageService = $projectImageService;
    }

    /**
     * @param StoreProjectGeneralContentSectionTwoImageRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProjectGeneralContentSectionTwoImageRequest $request)
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
