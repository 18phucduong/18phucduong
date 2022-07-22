<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function create(array $userData): ?User
    {
        return User::create($userData);
    }

    public function findUserVerifyByEmail(string $email): ?User
    {
        return User::where([
            ['email', '=', $email],
            ['email_verified_at', '<>', null]
        ])->first();
    }
}
