<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PagesController::class, 'index'])->name('home');
Route::get('/artist', [PagesController::class, 'artist'])->name('artist');
Route::get('/venue', [PagesController::class, 'venue'])->name('venue');
Route::get('/pricing', [PagesController::class, 'pricing'])->name('pricing');
Route::get('/signin', [PagesController::class, 'signin'])->name('signin');

// user route
Route::post('/pricing', [UserController::class, 'login'])->name('signin');
Route::get('/signin/signup', [UserController::class, 'signup'])->name('signup');
Route::post('/signin', [UserController::class, 'store'])->name('signup.store');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// admin route
Route::get('/admin', [AdminController::class, 'loginForm'])->name('admin.login');
Route::post('/admin/dashboard', [AdminController::class, 'login'])->name('admin.login.post');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
// Dashboard admin
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);



