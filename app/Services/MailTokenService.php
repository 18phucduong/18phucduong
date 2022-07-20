<?php

namespace App\Services;

use App\Models\EmailToken;
use Illuminate\Support\Str;

class MailTokenService
{

    public function generateToken(int $type): string
    {
        $token = Str::random(60);
        return  $this->checkTokenIsExists($token, $type) ?  $this->generateToken($type) : $token;
    }

    private function checkTokenIsExists($token, int $type): bool
    {
        return !is_null(EmailToken::findByFields([
            'token' => $token,
            'type' => $type
        ])->first());
    }
}
