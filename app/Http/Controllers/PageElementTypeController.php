<?php

namespace App\Http\Controllers;

use App\Services\PageElementTypeService;
use Illuminate\Http\Request;

class PageElementTypeController extends Controller
{
    /**
     * @var PageElementTypeService
     */
    private $pageElementTypeService;

    public function __construct(PageElementTypeService $pageElementTypeService)
    {
        $this->pageElementTypeService = $pageElementTypeService;
    }

    public function index()
    {
        $types = $this->pageElementTypeService->all();

        return response()->json(['types' => $types]);
    }
}
