<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTopMenuLinkRequest;
use App\Services\TopMenuLinkService;

/**
 * Class TopMenuLinkController
 * @package App\Http\Controllers\Template
 */
class TopMenuLinkController extends Controller
{
    /**
     * @var TopMenuLinkService
     */
    private $topMenuLinkService;

    /**
     * TopMenuLinkController constructor.
     * @param TopMenuLinkService $topMenuLinkService
     */
    public function __construct(TopMenuLinkService $topMenuLinkService)
    {
        $this->topMenuLinkService = $topMenuLinkService;
    }

    /**
     * @param CreateTopMenuLinkRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateTopMenuLinkRequest $request)
    {
        $link = $this->topMenuLinkService->store($request);

        return response()->json(['link' => $link, 'success' => 'New link is stored']);
    }
}
