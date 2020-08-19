<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestimonialSettingsRequest;
use App\Services\TestimonialSettingsService;

/**
 * Class TestimonialSettingsController
 * @package App\Http\Controllers\Template
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
     * @param StoreTestimonialSettingsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTestimonialSettingsRequest $request)
    {
        $settings = $this->testimonialSettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }
}
