<?php

use App\Http\Controllers\Admin\AdminAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\HomeSectionSettingController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\AdController;
use App\Http\Controllers\Admin\AdminSubscriberController;
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

//    Home Dashboard Route
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

    //===================== Profile Routes =====================
    Route::put('profile-password-update/{id}', [ProfileController::class, 'updatePassword'])->name('profile.password.update');

    /* Profile Route */
    Route::resource('profile', ProfileController::class);

    /* Language Route */
    Route::resource('language', LanguageController::class);

    /* Categories Route */
    Route::resource('categories', CategoryController::class);

    /* News Route */
    Route::get('fetch-news-category', [NewsController::class, 'fetchCategory'])->name('fetch-news-category');

    Route::get('toggle-news-status', [NewsController::class, 'toggleNewsStatus'])->name('toggle-news-status');

    Route::get('news-copy/{id}', [NewsController::class, 'copyNews'])->name('news-copy');

    Route::resource('news', NewsController::class);

    /* Home section setting Route */
    Route::get('home-section-setting', [HomeSectionSettingController::class, 'index'])->name('home-section-setting.index');

    Route::put('home-section-setting', [HomeSectionSettingController::class, 'update'])->name('home-section-setting.update');

    /* Social Count Route */
    Route::resource('social-count', SocialController::class);

    /* Advertisement Route */
    Route::resource('ads', AdController::class);

    /* Advertisement Route */
    Route::resource('subscribers', AdminSubscriberController::class);

});
