<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('send-test-mail', [TestMailController::class, 'sendTestMail']);
Route::controller(AuthController::class)->name('auth.')->group(function () {
    Route::get('/login', 'loginView')->name('login_view');
    Route::post('/login', 'login')->name('login');
    Route::get('/logout', 'logout')->name('logout')->middleware(['auth', 'auth.session']);
    Route::get('/register', 'registerView')->name('register_vew');
    Route::post('/register', 'storeUser')->name('register');
    Route::get('/forgot-password', 'forgotPasswordView')->name('forgot_password_view');
    Route::post('/send-forgot-password', 'sendForgotPasswordMail')->name('send_forgot_password');
    Route::get('/reset-password', 'resetPasswordView')->name('reset_password_view');
    Route::post('/reset-password', 'resetPassword')->name('reset_password');
    Route::get('/verify-account', 'sendVerifyAccount')->name('send_verify_account')->middleware(['auth', 'auth.session']);;
    Route::post('/verify-account', 'verifyAccount')->name('verify_account')->middleware(['auth', 'auth.session']);
});
Route::middleware(['auth', 'auth.session'])->get('/home', [HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'auth.session'])->get('/adnin', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'loginView');
        Route::post('/login', 'login');
        Route::get('/forgot-password', 'forgotPasswordView')->name('forgot_password_view');
        Route::post('/send-forgot-password', 'sendForgotPasswordMail')->name('send_forgot_password');
        Route::get('/reset-password', 'resetPasswordView')->name('reset_password_view');
        Route::post('/reset-password', 'resetPassword')->name('reset_password');
    });

    Route::group(['middleware' => ['auth:admin']], function () {
        Route::controller(AuthController::class)->group(function () {
            Route::get('/logout', 'logout')->name('logout')->middleware(['auth', 'auth.session']);
            Route::get('/register', 'registerView')->name('register_vew');
            Route::post('/register', 'storeUser')->name('register');
        });
        Route::get('/dashboard', [DashboardController::class, 'index']);
    });
});
