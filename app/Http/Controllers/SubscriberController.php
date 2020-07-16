<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriberRequest;
use App\Services\SubscriberService;

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

    public function store(StoreSubscriberRequest $request)
    {
        $subscriber = $this->subscriberService->store($request);

        return response()->json(['subscriber' => $subscriber]);
    }
}
