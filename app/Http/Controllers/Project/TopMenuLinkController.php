<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTopMenuLinkRequest;
use App\Services\TopMenuLinkService;
use Illuminate\Http\Request;

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
    public function store(CreateTopMenuLinkRequest $request): \Illuminate\Http\JsonResponse
    {
        $link = $this->topMenuLinkService->store($request);

        return response()->json(['link' => $link, 'success' => 'New link is stored']);
    }

    /**
     * @param CreateTopMenuLinkRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CreateTopMenuLinkRequest $request, int $id): \Illuminate\Http\JsonResponse
    {
        $link = $this->topMenuLinkService->update($request, $id);

        return response()->json(['link' => $link]);
    }
}
