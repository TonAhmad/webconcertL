<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[PagesController::class,'index'])->name('home');
Route::get('/artist', [PagesController::class, 'artist'])->name('artist');
Route::get('/venue', [PagesController::class, 'venue'])->name('venue');
Route::get('/pricing', [PagesController::class, 'pricing'])->name('pricing');
