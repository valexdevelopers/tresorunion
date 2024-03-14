<?php

use App\Http\Controllers\Admin;

Route::prefix('admin')->group(function () {
    Route::get('register', [Admin\RegisterController::class, 'create'])->name('admin.register.create');
    Route::post('register', [Admin\RegisterController::class, 'store'])->name('admin.register.store');

    Route::get('login', [Admin\LoginController::class, 'create'])->name('admin.login.create');
    Route::post('login', [Admin\LoginController::class, 'store'])->name('admin.login.store');

    Route::middleware(['adminAuth', 'verifiedAdmin'])->group(function(){
        Route::get('home', [Admin\DashboardController::class, 'index'])->name('admin.dashboard.home');
        Route::post('logout', [Admin\DashboardController::class, 'logout'])->name('admin.logout');
        Route::get('transfer/method', [Admin\DashboardController::class, 'create'])->name('admin.transfer.method.create');
        Route::post('transfer/method', [Admin\DashboardController::class, 'store'])->name('admin.transfer.method.store');
        Route::get('pending/transfers', [Admin\DashboardController::class, 'pending'])->name('admin.users.transfer.pending');

        Route::get('password', [Admin\PasswordController::class, 'create'])->name('admin.password.create');
        Route::post('password', [Admin\PasswordController::class, 'store'])->name('admin.password.store');

        Route::get('users', [Admin\UserController::class, 'index'])->name('admin.users.index');
        Route::get('users/new', [Admin\UserController::class, 'create'])->name('user.register.create');
        Route::post('users', [Admin\UserController::class, 'store'])->name('user.register.store');
        Route::get('users/delete/{id}', [Admin\UserController::class, 'destroy'])->name('admin.user.destroy');
        Route::get('users/freeze/{id}', [Admin\UserController::class, 'freeze'])->name('admin.user.freeze');
        Route::get('users/activate/{id}', [Admin\UserController::class, 'activate'])->name('admin.user.activate');
    });
});