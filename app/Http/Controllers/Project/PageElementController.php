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

    /**
     * PageElementController constructor.
     * @param PageElementService $pageElementService
     * @param ProjectService $projectService
     */
    public function __construct(PageElementService $pageElementService, ProjectService $projectService)
    {
        $this->pageElementService = $pageElementService;
        $this->projectService = $projectService;
    }

    /**
     * @param AuthRequest $request
     * @param $slug
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(AuthRequest $request, $slug)
    {
        $element = $this->pageElementService->store($request, $this->projectService->find($request->input('project_id')));

        return response()->json(['element' => $element, 'success' => 'Page element is created']);
    }

    /**
     * @param AuthRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(AuthRequest $request, $id)
    {
        $element = $this->pageElementService->update($request, $id);

        return response()->json(['element' => $element, 'success' => 'Page element is updated']);
    }

    /**
     * @param AuthRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(AuthRequest $request, $id)
    {
        $this->pageElementService->delete($id);

        return response()->json(['success' => 'Element is deleted']);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function renderSingle($id)
    {
        $data = $this->projectService->showRenderedProjectSingleComponentWithData($id);

        return response()->json(['view' => $data['view'], 'element' => $data['element']]);
    }

    /**
     * @param AuthRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(AuthRequest $request, int $id)
    {
        $settings = $this->pageElementService->find($id);

        return response()->json(['settings' => $settings]);
    }
}
