<?php

namespace App\Http\Controllers;

use App\Services\SubscriberService;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * @var SubscriberService
     */
    private $subscriberService;

    public function __construct(SubscriberService $subscriberService)
    {
        $this->subscriberService = $subscriberService;
    }

    public function store(Request $request)
    {
        $subscriber = $this->subscriberService->store($request);

        return response()->json(['subscriber' => $subscriber]);
    }
}
