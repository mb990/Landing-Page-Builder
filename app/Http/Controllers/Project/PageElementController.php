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

    public function destroy(AuthRequest $request, $id)
    {
        $this->pageElementService->delete($id);

        return response()->json(['success' => 'Element is deleted']);
    }

    public function renderSingle($id)
    {
        $data = $this->projectService->showRenderedProjectSingleComponentWithData($id);

        return response()->json(['view' => $data['view'], 'element' => $data['element']]);
    }
}
