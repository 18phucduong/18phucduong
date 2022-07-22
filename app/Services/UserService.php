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

    public function update(User $user, array $data)
    {
        return $user->update($data);
    }

    public function getUserByMailToken(string $token)
    {
        return User::join('email_tokens', 'user.id', '=', 'email_tokens.user_id')->where('email_tokens.token', $token)->first();
    }
}
