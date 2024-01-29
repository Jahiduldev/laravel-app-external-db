<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepository implements IUserRepository
{
    /**
     * @return null|array
     */
    public function getUserlist(): ?array
    {
        return  User::all()->toArray();
    }
}