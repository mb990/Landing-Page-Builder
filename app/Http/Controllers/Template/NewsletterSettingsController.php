<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplateNewsletterSettingsRequest;
use App\Services\NewsletterService;
use Illuminate\Http\Request;

/**
 * Class NewsletterSettingsController
 * @package App\Http\Controllers\Template
 */
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
     * @param StoreTemplateNewsletterSettingsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTemplateNewsletterSettingsRequest $request)
    {
        $settings = $this->newsletterService->store($request);

        return response()->json(['settings' => $settings]);
    }
}
