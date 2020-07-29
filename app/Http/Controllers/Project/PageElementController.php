<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Services\PageElementService;
use Illuminate\Http\Request;

class PageElementController extends Controller
{
    /**
     * @var PageElementService
     */
    private $pageElementService;

    public function __construct(PageElementService $pageElementService)
    {
        $this->pageElementService = $pageElementService;
    }

    public function store(Request $request, $slug)
    {
        $element = $this->pageElementService->store($request);

        return response()->json(['element' => $element, 'success' => 'Page element is created']);
    }
}
