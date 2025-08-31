<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::post('/contact-submit', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/', [WebPageController::class, 'landing'])->name('webpage.view');
Route::get('/page/{name}', [WebPageController::class, 'viewPage'])->name('webpage.dynamic');

//Auth
Route::get('login', action: [AuthController::class, 'login'])->name('login');
Route::post('login', action: [AuthController::class, 'authenticate'])->name('login.authenticate');
Route::get('signup', action: [AuthController::class, 'signup'])->name('signup');
Route::post('signup', action: [AuthController::class, 'createUser'])->name('signup.create');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//Auth for admin and user
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard/admin', [UserController::class, 'adminDashboard'])->name('dashboard.admin');
    Route::get('dashboard/user', [UserController::class, 'userDashboard'])->name('dashboard.user');

    // Booking Related Routes
    Route::get('booking/all', [BookingController::class, 'index'])->name('booking.all');
    Route::get('booking/my', [BookingController::class, 'userBookings'])->name('booking.my');
    Route::get('booking/add', [BookingController::class, 'add'])->name('booking.add');
    Route::post('booking/save', [BookingController::class, 'save'])->name('booking.save');
    Route::get('booking/{id}', [BookingController::class, 'getBookingById'])->name('booking.edit');
    Route::post('booking/{id}', [BookingController::class, 'updateBookingById'])->name('booking.update');
    Route::get('booking/delete/{id}', [BookingController::class, 'viewDelete'])->name('booking.view.delete');
    Route::post('booking/delete/{id}', [BookingController::class, 'delete'])->name('booking.delete');

    // Webpage Related Routes
    Route::get('webpage', [WebPageController::class, 'index'])->name('webpage.index');
    Route::get('webpage/add', [WebPageController::class, 'add'])->name('webpage.add');
    Route::post('webpage/save', [WebPageController::class, 'save'])->name('webpage.save');
    Route::get('webpage/{id}', [WebPageController::class, 'edit'])->name('webpage.edit');
    Route::post('webpage/{id}', [WebPageController::class, 'update'])->name('webpage.update');
    Route::get('webpage/delete/{id}', [WebPageController::class, 'viewDelete'])->name('webpage.view.delete');
    Route::post('webpage/delete/{id}', [WebPageController::class, 'delete'])->name('webpage.delete');

    // User Related Routes
    Route::get('user', [UserController::class, 'index'])->name('user');
    Route::get('user/add', [UserController::class, 'add'])->name('user.add');
    Route::post('user/save', [UserController::class, 'save'])->name('user.save');
    Route::get('user/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('user/delete/{id}', [UserController::class, 'viewDelete'])->name('user.view.delete');
    Route::post('user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

    //User profile related routes
    Route::get('profile', [UserController::class, 'getProfile'])->name('user.profile.get');
    Route::post('profile', [UserController::class, 'saveProfile'])->name('user.profile.save');
});