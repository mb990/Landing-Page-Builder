<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectTestimonialSectionRequest;
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
     * TestimonialSectionController constructor.
     * @param TestimonialSectionService $testimonialSectionService
     */
    public function __construct(TestimonialSectionService $testimonialSectionService)
    {
        $this->testimonialSectionService = $testimonialSectionService;
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
