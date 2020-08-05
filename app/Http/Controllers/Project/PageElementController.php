<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Services\PageElementService;
use App\Services\ProjectService;
use Illuminate\Http\Request;

class PageElementController extends Controller
{
    /**
     * @var PageElementService
     */
    private $pageElementService;
    /**
     * @var ProjectService
     */
    private $projectService;

    public function __construct(PageElementService $pageElementService, ProjectService $projectService)
    {
        $this->pageElementService = $pageElementService;
        $this->projectService = $projectService;
    }

    public function store(AuthRequest $request, $slug)
    {
        $element = $this->pageElementService->store($request);

        return response()->json(['element' => $element, 'success' => 'Page element is created']);
    }

    public function renderSingle($id)
    {
        $view = $this->projectService->renderSingleProjectPageElement($id);

        return response()->json(['view' => $view]);
    }
}
