<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTopMenuLinkRequest;
use App\Services\TopMenuLinkService;

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

    public function store(CreateTopMenuLinkRequest $request)
    {
        $link = $this->topMenuLinkService->store($request);

        return response()->json(['link' => $link, 'success' => 'New link is stored']);
    }
}
