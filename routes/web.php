<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[PagesController::class,'index'])->name('home');
Route::get('/artist', [PagesController::class, 'artist'])->name('artist');
Route::get('/venue', [PagesController::class, 'venue'])->name('venue');
Route::get('/pricing', [PagesController::class, 'pricing'])->name('pricing');
Route::get('/signin', [PagesController::class, 'signin'])->name('signin');
Route::get('/signup', [PagesController::class, 'signup'])->name('signup');

// admin route
Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
Route::get('/admin/ticket', [AdminController::class, 'ticket'])->name('ticket');
