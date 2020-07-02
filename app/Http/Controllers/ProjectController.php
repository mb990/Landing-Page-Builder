<?php

namespace App\Http\Controllers;

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
}
