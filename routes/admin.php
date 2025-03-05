<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\LanguageController;
//============================ Public Admin Routes ============================

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'guest'], function () {

    Route::get('login', [AdminAuthController::class, 'login'])->name('login');

    Route::post('login', [AdminAuthController::class, 'handleLogin'])->name('handle-login');

    //========================    Reset Password Routes   ========================
    Route::get('forgot-password', [AdminAuthController::class, 'forgotPassword'])->name('forgot-password');

    Route::post('forgot-password', [AdminAuthController::class, 'sendResetLink'])->name('forgot-password.send');

    Route::get('reset-password/{token}', [AdminAuthController::class, 'resetPassword'])->name('reset-password');

    Route::post('reset-password', [AdminAuthController::class, 'handleResetPassword'])->name('reset-password.send');

});


//============================ Protected Admin Routes ============================
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['admin']], function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

    //===================== Profile Routes =====================
    Route::put('profile-password-update/{id}', [ProfileController::class, 'updatePassword'])->name('profile.password.update');

    Route::resource('profile', ProfileController::class);

    //===================== Languages Routes =====================
    Route::resource('language', LanguageController::class);

});
