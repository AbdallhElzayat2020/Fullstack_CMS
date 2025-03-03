<?php

use App\Http\Controllers\Admin\AdminAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'guest'], function () {

    Route::get('login', [AdminAuthController::class, 'index'])->name('login.index'); //admin.login

    Route::post('login', [AdminAuthController::class, 'login'])->name('login');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['admin']], function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
});
