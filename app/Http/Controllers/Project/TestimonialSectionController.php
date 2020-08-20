<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\StoreProjectTestimonialSectionRequest;
use App\Services\PageElementService;
use App\Services\TestimonialSectionService;
use Illuminate\Http\Request;

/**
 * Class TestimonialSectionController
 * @package App\Http\Controllers\Project
 */
class TestimonialSectionController extends Controller
{
    /**
     * @var TestimonialSectionService
     */
    private $testimonialSectionService;
    /**
     * @var PageElementService
     */
    private $pageElementService;

    /**
     * TestimonialSectionController constructor.
     * @param TestimonialSectionService $testimonialSectionService
     * @param PageElementService $pageElementService
     */
    public function __construct(TestimonialSectionService $testimonialSectionService, PageElementService $pageElementService)
    {
        $this->testimonialSectionService = $testimonialSectionService;
        $this->pageElementService = $pageElementService;
    }

    /**
     * @param AuthRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(AuthRequest $request, int $id): \Illuminate\Http\JsonResponse
    {
        $section = $this->pageElementService->find($id)->pageElementable;

        return response()->json(['section' => $section]);
    }

    /**
     * @param StoreProjectTestimonialSectionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProjectTestimonialSectionRequest $request)
    {
        $section = $this->testimonialSectionService->store($request);

        return response()->json(['section' => $section]);
    }
}
