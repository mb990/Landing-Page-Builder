<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriberRequest;
use App\Services\SubscriberService;

/**
 * Class SubscriberController
 * @package App\Http\Controllers
 */
class SubscriberController extends Controller
{
    /**
     * @var SubscriberService
     */
    private $subscriberService;

    /**
     * SubscriberController constructor.
     * @param SubscriberService $subscriberService
     */
    public function __construct(SubscriberService $subscriberService)
    {
        $this->subscriberService = $subscriberService;
    }

    /**
     * @param StoreSubscriberRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreSubscriberRequest $request)
    {
        $subscriber = $this->subscriberService->store($request);

        return response()->json(['subscriber' => $subscriber]);
    }
}
