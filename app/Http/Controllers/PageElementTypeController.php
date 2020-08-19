<?php

namespace App\Http\Controllers;

use App\Services\PageElementTypeService;
use Illuminate\Http\Request;

/**
 * Class PageElementTypeController
 * @package App\Http\Controllers
 */
class PageElementTypeController extends Controller
{
    /**
     * @var PageElementTypeService
     */
    private $pageElementTypeService;

    /**
     * PageElementTypeController constructor.
     * @param PageElementTypeService $pageElementTypeService
     */
    public function __construct(PageElementTypeService $pageElementTypeService)
    {
        $this->pageElementTypeService = $pageElementTypeService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $types = $this->pageElementTypeService->all();

        return response()->json(['types' => $types]);
    }
}
