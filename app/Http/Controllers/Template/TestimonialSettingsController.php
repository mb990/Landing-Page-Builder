<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
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
