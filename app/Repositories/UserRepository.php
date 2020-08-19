<?php


namespace App\Repositories;


use App\User;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository
{
    /**
     * @var User
     */
    private $user;

    /**
     * UserRepository constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function findBySlug($slug)
    {
        return $this->user->where('slug', $slug)
            ->firstOrFail();
    }

    /**
     * @return mixed
     */
    public function usersWithoutAdmin()
    {
        return $this->user->doesntHave('roles')->get();
    }
}
