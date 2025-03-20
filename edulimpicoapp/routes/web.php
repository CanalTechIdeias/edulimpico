<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionController;

Route::get('/', function () {
    return view('welcome');
});

// auth
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegister')->name('show.register');
    Route::get('/login', 'showLogin')->name('show.login');
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
});

// Question
Route::resource('questions', QuestionController::class)->middleware('auth');


// Room
Route::resource('rooms', RoomController::class)->middleware('auth');


// Ranking
Route::resource('rankings', RankingController::class)->middleware('auth');


// Subscribe
Route::resource('subscriptions', SubscribeController::class)->middleware('auth');