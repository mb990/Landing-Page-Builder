<?php


namespace App\Services;


use App\Repositories\UserRepository;

class UserService
{
    /**
     * @var UserRepository
     */
    private $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function findBySlug($slug)
    {
        return $this->user->findBySlug($slug);
    }
}
