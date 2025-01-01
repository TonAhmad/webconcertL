<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PagesController::class, 'index'])->name('home');
Route::get('/artist', [PagesController::class, 'artist'])->name('artist');
Route::get('/venue', [PagesController::class, 'venue'])->name('venue');
// Route::get('/pricing', [PagesController::class, 'pricing'])->name('pricing');
Route::get('/signin', [PagesController::class, 'signin'])->name('signin');

//user buy ticket
Route::get('/ticket', [TicketController::class, 'showTicketsWithConcerts'])->name('ticket.show');
Route::post('/purchase/{ticket_id}/{quantity}', [TicketController::class, 'showPurchaseForm'])->name('purchase.form');
Route::post('/purchase', [TicketController::class, 'processPurchase'])->name('purchase.process');


// user route
Route::post('/ticket', [UserController::class, 'login'])->name('signin');
Route::get('/signin/signup', [UserController::class, 'signup'])->name('signup');
Route::post('/signin', [UserController::class, 'store'])->name('signup.store');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/account', [UserController::class, 'account'])->name('account');
Route::post('/account/refund', [UserController::class, 'refundTicket'])->name('refund.ticket');



// admin route
Route::get('/admin', [AdminController::class, 'loginForm'])->name('admin.login');
Route::post('/admin/dashboard', [AdminController::class, 'login'])->name('admin.login.post');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
// Dashboard admin
Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('dashboard');
Route::get('/admin/ticket', [TicketController::class, 'showTickets'])->name('tickets.index');
;

//add ticket route
Route::get('/admin/ticket/add', [TicketController::class, 'showAddTicketForm'])->name('ticket.add');
Route::post('/admin/ticket/add', [TicketController::class, 'addTicket'])->name('ticket.store');

// edit ticket route
Route::get('/admin/tickets/{ticket_id}/edit', [TicketController::class, 'editTicket'])->name('tickets.edit');
Route::post('/admin/tickets/{ticket_id}/edit', [TicketController::class, 'updateTicket'])->name('tickets.update');

//delete ticket route
Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])->name('tickets.destroy');
