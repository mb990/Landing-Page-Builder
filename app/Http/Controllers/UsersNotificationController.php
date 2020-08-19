<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminNotificationRequest;
use App\Services\AdminNotificationService;

/**
 * Class UsersNotificationController
 * @package App\Http\Controllers
 */
class UsersNotificationController extends Controller
{
    /**
     * @var AdminNotificationService
     */
    private $adminNotificationService;

    /**
     * UsersNotificationController constructor.
     * @param AdminNotificationService $adminNotificationService
     */
    public function __construct(AdminNotificationService $adminNotificationService)
    {
        $this->adminNotificationService = $adminNotificationService;
    }

    /**
     * @param AdminNotificationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendNotificationToRegisteredUsers(AdminNotificationRequest $request)
    {
        $this->adminNotificationService->sendMessageToAllUsers($request);

        return response()->json(['success' => 'Message sent.']);
    }
}
