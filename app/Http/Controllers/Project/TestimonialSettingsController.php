<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectTestimonialSettingsRequest;
use App\Services\TestimonialSettingsService;
use Illuminate\Http\Request;

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

    public function store(StoreProjectTestimonialSettingsRequest $request)
    {
        $settings = $this->testimonialSettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }
}
