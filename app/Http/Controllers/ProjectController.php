<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Services\ProjectService;

/**
 * Class ProjectController
 * @package App\Http\Controllers
 */
class ProjectController extends Controller
{
    /**
     * @var ProjectService
     */
    private $projectService;

    /**
     * ProjectController constructor.
     * @param ProjectService $projectService
     */
    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('profile.base-project-html');
    }

    /**
     * @param StoreProjectRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProjectRequest $request)
    {
        $project = $this->projectService->store($request);

        return response()->json(['project' => $project]);
    }

    /**
     * @param $projectSlug
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($projectSlug)
    {
        $views = $this->projectService->showRenderedProjectComponentsWithData($projectSlug);

        $project = $this->projectService->findBySlug($projectSlug);

        $elements = $project->getSections();

        return response()->json(['views' => $views, 'elements' => $elements]);
    }

    /**
     * @param $slug
     */
    public function delete($slug)
    {
        $this->projectService->delete($slug);
    }
}
