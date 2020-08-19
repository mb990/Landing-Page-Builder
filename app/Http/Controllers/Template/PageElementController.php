<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplatePageElementRequest;
use App\Services\PageElementService;
use Illuminate\Http\Request;

/**
 * Class PageElementController
 * @package App\Http\Controllers\Template
 */
class PageElementController extends Controller
{
    /**
     * @var PageElementService
     */
    private $pageElementService;

    /**
     * PageElementController constructor.
     * @param PageElementService $pageElementService
     */
    public function __construct(PageElementService $pageElementService)
    {
        $this->pageElementService = $pageElementService;
    }

    /**
     * @param StoreTemplatePageElementRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTemplatePageElementRequest $request)
    {
        $element = $this->pageElementService->store($request);

        return response()->json(['element' => $element, 'success' => 'Page element is created']);
    }
}
