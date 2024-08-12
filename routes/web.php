<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/test', function() {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function() {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function() {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

// PAGE CONTROLLER ROUTES
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/faq', [PageController::class, 'faq'])->name('faqs');
Route::get('/packages', [PageController::class, 'packages'])->name('packages');
Route::get('/rent', [PageController::class, 'rent'])->name('rent');
Route::get('/property/{id}', [PageController::class, 'propertyDetail'])
    ->name('property-detail');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/blog/{id}', [PageController::class, 'blogDetail'])
    ->name('blog-detail');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/login', [PageController::class, 'login'])->name('login');
Route::get('/register', [PageController::class, 'register'])->name('register');
Route::get('/re-password', [PageController::class, 'rePassword'])
    ->name('re-password');

// AUTH CONTROLLER ROUTES
Route::post('/register', [UserController::class, 'store'])
    ->name('register');
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');
Route::post('/login', [AuthController::class, 'login'])
    ->name('login');

//require __DIR__.'/auth.php';
Route::get('/login', [PageController::class, 'login'])->name('login');
