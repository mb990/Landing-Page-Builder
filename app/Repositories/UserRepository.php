<?php


namespace App\Repositories;


use App\User;

class UserRepository
{
    /**
     * @var User
     */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function findBySlug($slug)
    {
        return $this->user->where('slug', $slug)
            ->firstOrFail();
    }
}
