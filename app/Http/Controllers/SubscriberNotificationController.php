<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectSubscribersNotificationRequest;
use App\Services\ProjectSubscriberNotificationService;
use Illuminate\Http\Request;

class SubscriberNotificationController extends Controller
{
    /**
     * @var ProjectSubscriberNotificationService
     */
    private $projectSubscriberNotificationService;

    /**
     * SubscriberNotificationController constructor.
     * @param ProjectSubscriberNotificationService $projectSubscriberNotificationService
     */
    public function __construct(ProjectSubscriberNotificationService $projectSubscriberNotificationService)
    {
        $this->projectSubscriberNotificationService = $projectSubscriberNotificationService;
    }

    /**
     * @param ProjectSubscribersNotificationRequest $request
     */
    public function sendMessageToProjectSubscribers(ProjectSubscribersNotificationRequest $request)
    {
        $this->projectSubscriberNotificationService->sendMessageToProjectSubscribers($request);

        return response()->json(['success' => 'success']);
    }
}
