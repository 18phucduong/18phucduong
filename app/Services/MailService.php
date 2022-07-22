<?php

namespace App\Services;

use App\Mail\ResetPasswordMail;
use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public function send(User|string $user, Mailable $mail, array $moreUsers = []): void
    {
        Mail::to($user)
            ->bcc($moreUsers)
            ->queue($mail);
    }
    public function sendResetPasswordMail(User|string $user, string  $token): void
    {
        $this->send($user, new ResetPasswordMail($token));
    }
}
