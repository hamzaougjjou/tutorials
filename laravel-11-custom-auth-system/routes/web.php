<?php

use App\Http\Controllers\api\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::view("/" , "welcome")->name("home");


Route::get('/login', [AuthController::class , 'login'])->name('login');
Route::post('/login', [AuthController::class , 'login_store'])->name('login.store');
Route::get('/register', [AuthController::class , 'register'])->name('register');
Route::post('/register', [AuthController::class , 'register_store'])->name('register.store');
Route::post('/logout', [AuthController::class , 'logout'])->name('logout')->middleware('auth');;


Route::view('/profile', "auth.profile")->name('profile')->middleware('auth');;
// Email Verification Routes
Route::view('/email/verify', "auth.verify-email" )->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill(); // Mark the user's email as verified
    return redirect('/profile'); // Redirect after verification
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Illuminate\Http\Request $request) {
    $request->user()->sendEmailVerificationNotification(); // Resend the verification email
    return back()->with('message', 'Verification email sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');
