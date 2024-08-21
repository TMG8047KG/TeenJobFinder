<?php

use App\Http\Controllers\ProfileController;
use App\Models\Company;
use Illuminate\Support\Facades\Route;
use App\Models\Job;
use Illuminate\Support\Arr;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/jobs', function () {
    // Fetch all jobs from the database
    $jobs = Job::all();

    // Pass the jobs to the view
    return view('jobs', ['jobs' => $jobs]);
})->name('jobs');

use App\Http\Controllers\UserController;

Route::get('/profile_edit', function () {
    return view('profile_edit');
})->name('profile_edit');

Route::get('/profile', [ProfileController::class, 'show'])->middleware('auth');
Route::get('/profile', [UserController::class, 'index'])->name('profile');
Route::get('/profile/login', [UserController::class, 'loginView']);
Route::get('/profile/register', [UserController::class, 'registerView']);

Route::post('/profile/login', [UserController::class, 'login']);
Route::post('/profile/register', [UserController::class, 'register']);
Route::post('/profile/logout', [UserController::class, 'logout']);


