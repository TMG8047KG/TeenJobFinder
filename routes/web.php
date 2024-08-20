<?php

use App\Http\Controllers\UserController;
use App\Models\Company;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/jobs', function () {
    return view('jobs');
})->name('jobs');

Route::get('/profile_page', function () {
    return view('profile_page');
})->name('profile_page');

Route::get('/profile', [UserController::class, 'index'])->name('profile');
Route::get('/profile/login', [UserController::class, 'loginView']);
Route::get('/profile/register', [UserController::class, 'registerView']);

Route::post('/profile/login', [UserController::class, 'login']);
Route::post('/profile/register', [UserController::class, 'register']);
Route::post('/profile/logout', [UserController::class, 'logout']);


