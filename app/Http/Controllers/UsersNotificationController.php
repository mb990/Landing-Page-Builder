<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminNotificationRequest;
use App\Services\AdminNotificationService;

class UsersNotificationController extends Controller
{
    /**
     * @var AdminNotificationService
     */
    private $adminNotificationService;

    public function __construct(AdminNotificationService $adminNotificationService)
    {
        $this->adminNotificationService = $adminNotificationService;
    }

    public function sendNotificationToRegisteredUsers(AdminNotificationRequest $request)
    {
        $this->adminNotificationService->sendMessageToAllUsers($request);

        return response()->json(['success' => 'Message sent.']);
    }
}
