<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectTestimonialSectionRequest;
use App\Services\TestimonialSectionService;
use Illuminate\Http\Request;

class TestimonialSectionController extends Controller
{
    /**
     * @var TestimonialSectionService
     */
    private $testimonialSectionService;

    public function __construct(TestimonialSectionService $testimonialSectionService)
    {
        $this->testimonialSectionService = $testimonialSectionService;
    }

    public function store(StoreProjectTestimonialSectionRequest $request)
    {
        $section = $this->testimonialSectionService->store($request);

        return response()->json(['section' => $section]);
    }
}
