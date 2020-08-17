<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectNewsletterSettingsRequest;
use App\Http\Requests\StoreTemplateNewsletterSettingsRequest;
use App\Services\NewsletterService;
use Illuminate\Http\Request;

class NewsletterSettingsController extends Controller
{
    /**
     * @var NewsletterService
     */
    private $newsletterService;

    /**
     * NewsletterSettingsController constructor.
     * @param NewsletterService $newsletterService
     */
    public function __construct(NewsletterService $newsletterService)
    {
        $this->newsletterService = $newsletterService;
    }

    /**
     * @param StoreProjectNewsletterSettingsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProjectNewsletterSettingsRequest $request)
    {
        $settings = $this->newsletterService->store($request);

        return response()->json(['settings' => $settings]);
    }

    public function update(StoreProjectNewsletterSettingsRequest $request, $id)
    {
        $settings = $this->newsletterService->update($request, $id);

        return response()->json(['settings' => $settings]);
    }
}
