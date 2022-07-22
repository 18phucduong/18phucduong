<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Auth\ForgotPasswordRequest;
use App\Http\Requests\Client\Auth\LoginRequest;
use App\Http\Requests\Client\Auth\RegisterRequest;
use App\Http\Requests\Client\Auth\ResetPasswordRequest;
use App\Http\Requests\Client\Auth\VerifyAccountRequest;
use App\Services\MailService;
use App\Services\MailTokenService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(
        private UserService $userService,
        private MailService $mailService,
        private MailTokenService $mailTokenService,
    ) {
    }
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials, true)) {
            return redirect()->route('home');
        }


        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('user_name');
    }

    public function loginView()
    {
        return  view('auth.login');
    }

    public function registerView()
    {
        return  view('auth.register');
    }

    public function storeUser(RegisterRequest $request)
    {
        $user = $this->userService->create($request->all());

        if (!is_null($user)) {
            return redirect()->route('home');
        }
        return back();
    }

    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/home');
    }

    public function forgotPasswordView()
    {
        return  view('auth.forgot-password');
    }

    public function sendForgotPasswordMail(ForgotPasswordRequest $request): void
    {
        $user = $this->userService->findUserVerifyByEmail($request->email);
        $mailToken = $this->mailTokenService->generateResetPassWordToken($user);

        $this->mailService->sendResetPasswordMail($user, $mailToken->token);
    }

    public function resetPasswordView(Request $request)
    {
        return view('auth.reset-password', ['token' => $request->token]);
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $token = $this->mailTokenService->getMailTokenByToken($request->token);
        $user = $token?->user;
        if (!is_null($user)) {
            $this->userService->update($user, $request->only(['password']));
            $this->mailTokenService->delete($token);
        }
    }

    public function sendVerifyAccount()
    {
        $user = auth()->user();
        $mailToken = $this->mailTokenService->generateVerifyUserToken($user);
        $this->mailService->sendVerifyAccountMail($user, $mailToken->token);

        return redirect()->route('home');
    }

    public function verifyAccount(VerifyAccountRequest $request)
    {
        $token = $this->mailTokenService->getMailTokenByToken($request->token);
        $user = $token?->user;
        if (!is_null($user)) {
            $this->userService->update($user, ['email_verified_at' => now()]);
            $this->mailTokenService->delete($token);
        }
    }
}
