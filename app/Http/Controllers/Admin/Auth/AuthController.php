<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AdminService;

class AuthController extends Controller
{

    public function __construct(private AdminService $adminService)
    {
    }

    public function loginView()
    {
        return view('admin.pages.auth.login');
    }

    public function login(Request $request)
    {
    }

    public function registerView()
    {
        return view('admin.pages.auth.register');
    }

    public function register(Request $request)
    {
        $this->adminService->create($request->all());
    }

    public function sendResetPassword()
    {
    }

    public function resetPasswordView()
    {
    }

    public function resetPassword()
    {
    }
}
