<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectTestimonialSettingsRequest;
use App\Services\TestimonialSettingsService;
use Illuminate\Http\Request;

/**
 * Class TestimonialSettingsController
 * @package App\Http\Controllers\Project
 */
class TestimonialSettingsController extends Controller
{
    /**
     * @var TestimonialSettingsService
     */
    private $testimonialSettingsService;

    /**
     * TestimonialSettingsController constructor.
     * @param TestimonialSettingsService $testimonialSettingsService
     */
    public function __construct(TestimonialSettingsService $testimonialSettingsService)
    {
        $this->testimonialSettingsService = $testimonialSettingsService;
    }

    /**
     * @param StoreProjectTestimonialSettingsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProjectTestimonialSettingsRequest $request)
    {
        $settings = $this->testimonialSettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }
}
