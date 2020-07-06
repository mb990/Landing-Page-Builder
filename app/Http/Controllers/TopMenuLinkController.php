<?php

namespace App\Http\Controllers;

use App\Services\TopMenuLinkService;
use Illuminate\Http\Request;

class TopMenuLinkController extends Controller
{
    /**
     * @var TopMenuLinkService
     */
    private $topMenuLinkService;

    public function __construct(TopMenuLinkService $topMenuLinkService)
    {
        $this->topMenuLinkService = $topMenuLinkService;
    }

    public function store(Request $request)
    {
        $link = $this->topMenuLinkService->store($request);

        return response()->json(['link' => $link, 'success' => 'New link is stored']);
    }
}
