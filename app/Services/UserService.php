<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function create(array $userData): ?User
    {
        return User::create($userData);
    }
}
