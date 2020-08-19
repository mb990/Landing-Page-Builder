<?php


namespace App\Services;

use App\Notifications\ApplicationUsersNotification;

/**
 * Class AdminNotificationService
 * @package App\Services
 */
class AdminNotificationService
{
    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var StorageService
     */
    private $storageService;

    /**
     * AdminNotificationService constructor.
     * @param UserService $userService
     * @param StorageService $storageService
     */
    public function __construct(UserService $userService, StorageService $storageService)
    {
        $this->userService = $userService;
        $this->storageService = $storageService;
    }

    /**
     * @param $request
     */
    public function sendMessageToAllUsers($request)
    {
//        $image = $this->storageService->storeAdminNotificationImage($request);

        foreach ($this->userService->usersWithoutAdmin() as $user) {

            $user->notify(new ApplicationUsersNotification($request->input('message')));
        }

//        return asset($image['path']);
    }
}
