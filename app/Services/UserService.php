<?php


namespace App\Services;


use App\Repositories\UserRepository;

/**
 * Class UserService
 * @package App\Services
 */
class UserService
{
    /**
     * @var UserRepository
     */
    private $user;

    /**
     * UserService constructor.
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function findBySlug($slug)
    {
        return $this->user->findBySlug($slug);
    }

    /**
     * @return mixed
     */
    public function usersWithoutAdmin()
    {
        return $this->user->usersWithoutAdmin();
    }
}
