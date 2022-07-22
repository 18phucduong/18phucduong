<?php

namespace App\Services;

use App\Enums\MailTokenType;
use App\Models\EmailToken;
use App\Models\User;
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
        return !is_null(EmailToken::where([
            ['token', '=', $token],
            ['type', '=', $type]
        ])->first());
    }

    public function generateResetPassWordToken(User $user): EmailToken
    {
        $token = $this->generateToken(1);
        return EmailToken::create([
            'token' => $token,
            'type' => MailTokenType::RESET_PASSWORD,
            'user_id' => $user->id,
            'expires_at' => now()->addDays(config('mail.token_expires_at.reset_password'))
        ]);
    }
}
