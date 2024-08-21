<?php

use App\Http\Controllers\UserController;
use App\Models\Company;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/jobs', function () {
    // Fetch all jobs from the database
    $jobs = Job::all();

    // Pass the jobs to the view
    return view('jobs', ['jobs' => $jobs]);
})->name('jobs');



Route::get('/profile', [UserController::class, 'index'])->name('profile');
Route::get('/profile/login', [UserController::class, 'loginView']);
Route::get('/profile/register', [UserController::class, 'registerView']);

Route::post('/profile/login', [UserController::class, 'login']);
Route::post('/profile/register', [UserController::class, 'register']);
Route::post('/profile/logout', [UserController::class, 'logout']);


