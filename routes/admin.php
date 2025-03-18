<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\FooterGridThreeController;
use App\Http\Controllers\Admin\FooterGridTwoController;
use App\Http\Controllers\Admin\SettingController;
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
use App\Http\Controllers\Admin\AdminFooterSocialController;
use App\Http\Controllers\Admin\AdminFooterInfoController;
use App\Http\Controllers\Admin\FooterGridOneController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ContactMessageController;
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

    /* Subscribers Route */
    Route::resource('subscribers', AdminSubscriberController::class);

    /* Social Link Route */
    Route::resource('social-link', AdminFooterSocialController::class);

    /* Footer Info Route */
    Route::resource('footer-info', AdminFooterInfoController::class);

    /* Footer Grid One Route */
    Route::resource('footer-grid-one', FooterGridOneController::class);

    /* Footer Grid Two Route */
    Route::resource('footer-grid-two', FooterGridTwoController::class);

    /* Footer Grid Three Route */
    Route::resource('footer-grid-three', FooterGridThreeController::class);

    /* About Route */
    Route::get('about', [AboutController::class, 'index'])->name('about.index');
    Route::put('about', [AboutController::class, 'update'])->name('about.update');

    /* Contact Route */
    Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
    Route::put('contact', [ContactController::class, 'update'])->name('contact.update');

    /* Contact Messages Route */
    Route::get('contact-message', [ContactMessageController::class, 'index'])->name('contact-message.index');
    Route::post('contact-send-replay', [ContactMessageController::class, 'sendReplay'])->name('contact.replay-send');

    /* Settings Route */
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('general-setting', [SettingController::class, 'updateGeneralSetting'])->name('general-setting.update');

});
