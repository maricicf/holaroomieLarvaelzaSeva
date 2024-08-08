<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function() {
    return Inertia::render('Landing/Pages/index/index');
})->name('home');

Route::get('/faq', function() {
    return Inertia::render('Landing/Pages/pages/faqs');
})->name('faqs');

Route::get('/about', function() {
    return Inertia::render('Landing/Pages/pages/aboutus');
})->name('about');

Route::get('/packages', function() {
    return Inertia::render('Landing/Pages/pages/packages');
})->name('packages');

Route::get('/rent', function() {
    return Inertia::render('Landing/Pages/listing/rent');
})->name('rent');

Route::get('/blog', function() {
    return Inertia::render('Landing/Pages/pages/blog/blogs');
})->name('blog');

Route::get('/blog/{id}', function($id) {
    return Inertia::render('Landing/Pages/pages/blog/blog-detail', [
        'id' => $id,
    ]);
})->name('blog-detail');

Route::get('/contact', function() {
    return Inertia::render('Landing/Pages/contact');
})->name('contact');

Route::get('/login', function() {
    return Inertia::render('Landing/Pages/pages/auth-pages/auth-login');
})->name('login');

Route::get('/register', function() {
    return Inertia::render('Landing/Pages/pages/auth-pages/auth-register');
})->name('register');

Route::get('/re-password', function() {
    return Inertia::render('Landing/Pages/pages/auth-pages/auth-re-password');
})->name('register');

//require __DIR__.'/auth.php';
