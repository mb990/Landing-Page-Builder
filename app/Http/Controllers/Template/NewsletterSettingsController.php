<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplateNewsletterSettingsRequest;
use App\Services\NewsletterService;
use Illuminate\Http\Request;

class NewsletterSettingsController extends Controller
{
    /**
     * @var NewsletterService
     */
    private $newsletterService;

    public function __construct(NewsletterService $newsletterService)
    {
        $this->newsletterService = $newsletterService;
    }

    public function store(StoreTemplateNewsletterSettingsRequest $request)
    {
        $settings = $this->newsletterService->store($request);

        return response()->json(['settings' => $settings]);
    }
}
