<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MarksController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/posts', [PostController::class, 'posts'])->name('jobs');

Route::get('/posts/{id}', [PostController::class, 'post']);
Route::post('/posts/{id}', [MarksController::class, 'action']);

Route::get('/notifications', function () {
    return view('notifications');
})->name('notifications');

Route::get('/profile', [UserController::class, 'index'])->name('profile');

Route::get('/profile/login', [UserController::class, 'loginView']);
Route::get('/profile/register', [UserController::class, 'registerView']);

Route::post('/profile/login', [UserController::class, 'login']);
Route::post('/profile/register', [UserController::class, 'register'])->name('register');
Route::post('/profile/logout', [UserController::class, 'logout'])->name('profile.logout');

Route::get('/profile/edit', [UserController::class, 'editProfileView'])->name('profile_edit');
Route::post('/profile/edit', [UserController::class, 'updateProfile'])->name('profile.update');

Route::get('/post/options', [PostController::class, 'index'])->name('post.options');
Route::get('/post/create/user', [PostController::class, 'userForm']);
Route::post('/post/create/user', [PostController::class, 'lookingForWork']);
Route::get('/post/create/company', [PostController::class, 'companyForm']);
Route::post('/post/create/company', [PostController::class, 'listing']);

Route::get('/company/create', [CompanyController::class, 'index']);
Route::post('/company/create', [CompanyController::class, 'store']);


