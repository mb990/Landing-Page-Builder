<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTestimonialSettingsRequest;
use App\Services\TestimonialSettingsService;

class TestimonialSettingsController extends Controller
{
    /**
     * @var TestimonialSettingsService
     */
    private $testimonialSettingsService;

    public function __construct(TestimonialSettingsService $testimonialSettingsService)
    {
        $this->testimonialSettingsService = $testimonialSettingsService;
    }

    public function store(StoreTestimonialSettingsRequest $request)
    {
        $settings = $this->testimonialSettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }
}
