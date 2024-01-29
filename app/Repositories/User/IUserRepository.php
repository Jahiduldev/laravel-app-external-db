<?php

namespace App\Repositories\User;

interface IUserRepository
{
    /**
     * @return null|array
     */
    public function getUserlist(): ?array;
}