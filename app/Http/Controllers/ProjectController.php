<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Services\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * @var ProjectService
     */
    private $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index()
    {
        return view('profile.base-project-html');
    }

    public function store(StoreProjectRequest $request)
    {
        $project = $this->projectService->store($request);

        return response()->json(['project' => $project]);
    }

    public function show($projectSlug)
    {
        $views = $this->projectService->showRenderedProjectComponentsWithData($projectSlug);

        return response()->json(['views' => $views]);

//        $project = $this->projectService->findBySlug($projectSlug);
//
//        $sections = [];
//
//        $views = [];
//
//        foreach ($project->getSections() as $section) {
//
//            $sections[$section->id . '-' . $section->pageElementType->name] = $section;
//
//            $views[$section->id . '-' . $section->pageElementType->name] = view($section->blade_file, ['data' => $section->pageElementable])->render();
//        }
//
//        return response()->json(['sections' => $sections, 'views' => $views]);
    }

    public function delete($slug)
    {
        $this->projectService->delete($slug);
    }
}
