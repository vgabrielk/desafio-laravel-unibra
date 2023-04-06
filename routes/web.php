<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ResetPassswordController;
use App\Http\Controllers\RecoverPasswordController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('home');
});


Route::get('/registration', [RegistrationController::class, 'registrationView']);
Route::post('/registration', [RegistrationController::class, 'registrationUser'])->name('create-user');

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'checkLogin'])->name('post-login');

Route::get('/change-password', [ResetPassswordController::class, 'changeView']);
Route::post('/change-password', [ResetPassswordController::class, 'changePassword'])->name('change-pass');

Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');
Route::get('/dashboard', [DashboardController::class, 'dashboard']);


Route::get('/recover-password', function () {
    return view('recover');
})->middleware('guest')->name('recover-pass');

Route::post('/password-email',[RecoverPasswordController::class, 'forgot'] )->name('forgot');
Route::post('password/reset', [ForgotPasswordController::class, 'reset'])->name('reset');


Route::get('/recover-password/{token}', function ($token) {
    return view('reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');