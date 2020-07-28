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

    public function store(StoreProjectRequest $request)
    {
        $project = $this->projectService->store($request);

        return response()->json(['project' => $project]);
    }
}
