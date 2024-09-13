<?php

use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HotspotController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SpecificationCategoryController;
use App\Http\Controllers\SpecificationController;
use App\Http\Controllers\UserController;
use App\Models\Property;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::fallback(function() {
    return Inertia::render('Landing/Pages/pages/special-pages/404');
});

//Route::get('/test', function() {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});

//Route::get('/dashboard', function() {
//    return Inertia::render('Dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

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

// Authenticated user routes
Route::group(['middleware' => ['auth']], function() {
    Route::get('/profile', [PageController::class, 'profile'])
        ->name('profile');
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
    Route::post('/reservation', [ReservationController::class, 'store'])
        ->name('reservation.store');
});

Route::group(['middleware' => ['guest']], function() {
    // AUTH CONTROLLER ROUTES
    Route::post('/register', [UserController::class, 'store'])
        ->name('register');
    Route::post('/login', [AuthController::class, 'login'])
        ->name('login');
    Route::get('/login', [PageController::class, 'login'])
        ->name('login');
});

// FAQ CONTROLLER ROUTES
Route::get('/faq-create', [FaqController::class, 'create'])
    ->name('faq.create');

// PROPERTY CONTROLLER ROUTES

// ADMIN ROUTES
Route::prefix('admin')->middleware('admin')->group(function() {
    Route::get('/dashboard', [AdminPageController::class, 'dashboard'])
        ->name('admin.dashboard');
    Route::get('/properties', [AdminPageController::class, 'properties'])
        ->name('admin.properties');
    Route::get('/properties/create',
        [AdminPageController::class, 'createProperty'])
        ->name('admin.properties.create');
    Route::post('/properties/create',
        [PropertyController::class, 'create'])
        ->name('admin.properties.store');
    Route::delete('/properties/{id}',
        [PropertyController::class, 'delete'])
        ->name('admin.properties.delete');
    Route::get('/reservations', [AdminPageController::class, 'reservations'])
        ->name('admin.reservations');
    Route::get('/reservations/{id}/edit',
        [AdminPageController::class, 'editReservation'])
        ->name('admin.reservations.edit');
    Route::put('/reservations/{id}', [ReservationController::class, 'update'])
        ->name('admin.reservations.update');
    Route::get('/utilities', [AdminPageController::class, 'utilities'])
        ->name('admin.utilities');
    Route::get('/utilities/create',
        [AdminPageController::class, 'createUtility'])
        ->name('admin.utilities.create');
    Route::post('/utilities/create', [SpecificationController::class, 'create'])
        ->name('admin.specifications.store');
    Route::delete('/utilities/{id}', [SpecificationController::class, 'delete'])
        ->name('admin.specifications.delete');
    Route::get('/users', [AdminPageController::class, 'users'])
        ->name('admin.users');
    Route::get('/blog', [AdminPageController::class, 'blog'])
        ->name('admin.blog');
    Route::get('/blog/create', [AdminPageController::class, 'createBlog'])
        ->name('admin.blog.create');
    Route::post('/blog/create', [BlogController::class, 'store'])
        ->name('admin.blog.store');
    Route::get('/messages', [AdminPageController::class, 'messages'])
        ->name('admin.messages');
    Route::get('/specification-categories',
        [AdminPageController::class, 'categories'])
        ->name('admin.specification-categories');
    Route::get('/specification-categories/create',
        [AdminPageController::class, 'createCategory'])
        ->name('admin.specification-categories.create');
    Route::post('/specification-categories/create',
        [SpecificationCategoryController::class, 'store'])
        ->name('admin.specification-categories.store');
    Route::get('/areas', [AdminPageController::class, 'areas'])
        ->name('admin.areas');
    Route::get('/areas/create', [AdminPageController::class, 'createArea'])
        ->name('admin.areas.create');
    Route::post('/areas/create', [AreaController::class, 'store'])
        ->name('admin.areas.store');
    Route::delete('/areas/{id}', [AreaController::class, 'delete'])
        ->name('admin.areas.delete');
    Route::get('/hotspot', [AdminPageController::class, 'hotspots'])
        ->name('admin.hotspots');
    Route::get('/hotspot/create', [AdminPageController::class, 'createHotspot'])
        ->name('admin.hotspots.create');
    Route::post('/hotspot/create', [HotspotController::class, 'store'])
        ->name('admin.hotspots.store');
    Route::delete('/hotspot/{id}', [HotspotController::class, 'delete'])
        ->name('admin.hotspots.delete');
    Route::delete('/messages/{id}', [ContactController::class, 'delete'])
        ->name('admin.messages.delete');
});

// CONTACT ROUTES
Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');

Route::get('/json', function() {
    $properties = [1, 2, 3];
    return response()->json($properties);
})->name('json');

Route::get('/send-mail', function() {
    $reservation = App\Models\Reservation::find(17);
    Mail::to($reservation->user->email)
        ->send(new App\Mail\ReservationMail($reservation));
    return 'Mail sent!';
})->name('send-mail');

Route::get('/user-modifier', function() {
    return view('user');
})->name('user.modify');

Route::post('/user-modifier', [UserController::class, 'update'])
    ->name('user.update');
