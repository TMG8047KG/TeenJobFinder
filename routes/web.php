<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('/jobs/{id}', function ($id) {
      $job =  Job::find($id);
    return view('job', ['job' => $job]);
});

//Route::get('/profile_edit', function () {
//    return view('profile_edit');
//})->name('profile_edit');

Route::get('/profile', [UserController::class, 'index'])->name('profile');

Route::get('/profile/login', [UserController::class, 'loginView']);
Route::get('/profile/register', [UserController::class, 'registerView']);

Route::post('/profile/login', [UserController::class, 'login']);
Route::post('/profile/register', [UserController::class, 'register'])->name('register');
//Route::post('/profile/logout', [UserController::class, 'logout']);
Route::post('/profile/logout', [UserController::class, 'logout'])->name('profile.logout');

Route::get('/post/options', [PostController::class, 'index'])->name('post.options');
Route::get('/post/create/user', [PostController::class, 'userForm']);
Route::get('/post/create/company', [PostController::class, 'companyForm']);

Route::get('/company/create', [CompanyController::class, 'index']);

Route::get('/profile_edit', [UserController::class, 'editProfileView'])->name('profile_edit');

Route::post('/profile_edit', [UserController::class, 'updateProfile'])->name('profile.update');


