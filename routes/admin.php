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
        Route::get('users/passport/{id}', [Admin\UserController::class, 'passport'])->name('admin.user.passport.create');
        Route::post('users/passport', [Admin\UserController::class, 'updatepassport'])->name('admin.user.passport.store');

        Route::get('users/transaction/{id}', [Admin\UserController::class, 'transaction'])->name('admin.user.transaction.create');
        Route::post('users/transaction', [Admin\UserController::class, 'updatetransaction'])->name('admin.user.transaction.store');

        Route::get('users/securityquestion/{id}', [Admin\UserController::class, 'securityquestion'])->name('admin.user.securityquestion.create');
        Route::post('users/securityquestion', [Admin\UserController::class, 'updatesecurityquestion'])->name('admin.user.securityquestion.store');
        
        Route::get('users/password/{id}', [Admin\UserController::class, 'password'])->name('admin.user.password.create');
        Route::post('users/password', [Admin\UserController::class, 'updatepassword'])->name('admin.user.password.store');

        Route::get('users/sendmail/{id}', [Admin\UserController::class, 'sendmail'])->name('admin.user.sendmail.create');
        Route::post('users/sendmail', [Admin\UserController::class, 'sendmailtouser'])->name('admin.user.sendmail.store');
        
    });
});