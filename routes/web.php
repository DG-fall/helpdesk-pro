<?php
use Illuminate\Support\Facades\Route; use App\Http\Controllers\{AuthController,DashboardController,TicketController};
Route::get('/',fn()=>view('welcome'))->name('home');
Route::middleware('guest')->group(function(){Route::get('/login',[AuthController::class,'showLogin'])->name('login');Route::post('/login',[AuthController::class,'login']);Route::get('/register',[AuthController::class,'showRegister'])->name('register');Route::post('/register',[AuthController::class,'register']);});
Route::middleware('auth')->group(function(){Route::post('/logout',[AuthController::class,'logout'])->name('logout');Route::get('/dashboard',DashboardController::class)->name('dashboard');Route::resource('tickets',TicketController::class)->only(['index','create','store','show','edit','update']);Route::post('/tickets/{ticket}/comments',[TicketController::class,'comment'])->name('tickets.comments');});
