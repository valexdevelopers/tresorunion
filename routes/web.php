<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\site;
use App\Http\Controllers\User;

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


// routes not requiring auth middleware 

Route::get('/', [Site\PagesController::class, 'index'])->name('site.page.index');
Route::get('/about', [Site\PagesController::class, 'about'])->name('site.page.about');
Route::get('/contact', [Site\PagesController::class, 'contact'])->name('site.page.contact');
Route::get('/news', [Site\PagesController::class, 'news'])->name('site.page.news');
Route::get('/support', [Site\PagesController::class, 'support'])->name('site.page.support');



Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [User\DashboardController::class, 'index'])->name('user.dashboard.index');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';

Route::fallback(function (){
    return view('site.fallback');
});

