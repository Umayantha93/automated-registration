<?php

use App\Http\Controllers\Auth\BaseController;
use App\Http\Controllers\Auth\CaptchaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something VerificationCongreat!
|
*/
Route::middleware('auth')->group(function () {
    Route::get('/', [BaseController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::post('/verify', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('verification/resend', [VerificationController::class, 'resend'])->name('verification.resend');
Route::get('/captcha/verify', [CaptchaController::class, 'showCaptcha'])->name('captcha.verify');
Route::post('/captcha/verify', [CaptchaController::class, 'verifyCaptcha'])->name('captcha.verify');

require __DIR__.'/auth.php';
