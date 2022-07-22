<?php

namespace App\Services;

use App\Enums\MailTokenType;
use App\Models\EmailToken;
use App\Models\User;
use Illuminate\Support\Str;

class MailTokenService
{

    public function generateToken(MailTokenType $type): string
    {
        $token = Str::random(60);
        return  $this->checkTokenIsExists($token, $type) ?  $this->generateToken($type) : $token;
    }

    private function checkTokenIsExists($token, MailTokenType $type): bool
    {
        return !is_null(EmailToken::where([
            ['token', '=', $token],
            ['type', '=', $type->value]
        ])->first());
    }

    public function generateResetPasswordToken(User $user): EmailToken
    {
        $token = $this->generateToken(MailTokenType::RESET_PASSWORD);
        return EmailToken::create([
            'token' => $token,
            'type' => MailTokenType::RESET_PASSWORD,
            'user_id' => $user->id,
            'expires_at' => now()->addDays(config('mail.token_expires_at.reset_password'))
        ]);
    }
    public function generateVerifyUserToken(User $user): EmailToken
    {
        $token = $this->generateToken(MailTokenType::VERIFY);
        return EmailToken::create([
            'token' => $token,
            'type' => MailTokenType::VERIFY,
            'user_id' => $user->id,
            'expires_at' => now()->addDays(config('mail.token_expires_at.verify'))
        ]);
    }

    public function getMailTokenByToken(string $token): ?EmailToken
    {
        return EmailToken::where('token', $token)->first();
    }

    public function delete(EmailToken $token): bool
    {
        return $token->delete();
    }
}
