<?php


namespace App\Services;

use App\Notifications\ApplicationUsersNotification;
use Illuminate\Support\Facades\Notification;

class AdminNotificationService
{
    /**
     * @var UserService
     */
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function sendMessageToAllUsers($request)
    {
        foreach ($this->userService->usersWithoutAdmin() as $user) {

            $user->notify(new ApplicationUsersNotification($request->input('message')));
        }
    }
}
