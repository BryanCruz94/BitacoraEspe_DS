<?php

namespace App\Policies;

use App\Models\User;

class AdminSectionPolicy
{
    /**
     * The user instance.
     *
     * @var User|null
     */
    private $user;

    /**
     * Create a new policy instance.
     *
     * @param User|null $user
     */
    public function __construct(?User $user)
    {
        $this->user = $user;
    }

    /**
     * Check if the user is an admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->user !== null && $this->user->is_admin;
    }
}
