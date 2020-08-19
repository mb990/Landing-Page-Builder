<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Services\TestimonialSectionService;
use Illuminate\Http\Request;

/**
 * Class TestimonialSectionController
 * @package App\Http\Controllers\Template
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
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $section = $this->testimonialSectionService->store($request);

        return response()->json(['section' => $section]);
    }
}
