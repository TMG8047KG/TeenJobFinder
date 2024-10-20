<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\MarksController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CompanyMiddleware;
use App\Http\Middleware\CompanyPost;
use App\Http\Middleware\isUser;
use Illuminate\Support\Facades\Route;

Route::get('/footer', function () {
    return view('footer');
})->name('footer');

Route::get('/posts', [PostController::class, 'posts'])->name('jobs');
Route::post('/posts', [PostController::class, 'posts']);

Route::get('/posts/{id}', [PostController::class, 'post']);
Route::post('/posts/{id}', [MarksController::class, 'action']);

Route::middleware([isUser::class])->group(function () {
    //Profile actions
    Route::get('/profile', [UserController::class, 'index'])->name('profile');
    Route::post('/profile/logout', [UserController::class, 'logout'])->name('profile.logout');
    Route::get('/profile/edit', [UserController::class, 'editProfileView'])->name('profile_edit');
    Route::post('/profile/edit', [UserController::class, 'updateProfile'])->name('profile.update');

    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
    Route::get('/posts/{id}/edit', [PostController::class, 'editView']);
    Route::post('/posts/{id}/edit', [PostController::class, 'edit']);
    Route::post('/posts/{id}/delete', [PostController::class, 'delete']);

    //Post creation
    Route::get('/post/options', [PostController::class, 'index'])->name('post.options');
    Route::get('/post/create/user', [PostController::class, 'userForm']);
    Route::post('/post/create/user', [PostController::class, 'lookingForWork']);
    Route::middleware([CompanyPost::class])->group(function () {
        Route::get('/post/create/company', [PostController::class, 'companyForm']);
        Route::post('/post/create/company', [PostController::class, 'listing']);

        Route::get('/company/dashboard', [CompanyController::class, 'dashboard'])->name('company.dashboard');
        Route::get('/company/edit', [CompanyController::class, 'edit'])->name('company.edit');
        Route::post('/company/update', [CompanyController::class, 'update'])->name('company.update');
    });
    Route::middleware([CompanyMiddleware::class])->group(function () {
        Route::get('/company/create', [CompanyController::class, 'index']);
        Route::post('/company/create', [CompanyController::class, 'store']);
    });
});


Route::get('/profile/login', [UserController::class, 'loginView']);
Route::get('/profile/register', [UserController::class, 'registerView']);
Route::post('/profile/login', [UserController::class, 'login']);
Route::post('/profile/register', [UserController::class, 'register'])->name('register');

Route::get('/posts', [PostController::class, 'posts'])->name('jobs');
Route::get('/posts/{id}', [PostController::class, 'post'])->name('post.show');
Route::post('/posts/{id}', [MarksController::class, 'action']);
Route::get('/search', [PostController::class, 'searchSuggestions'])->name('search.suggestions');
Route::get('/posts/search', [PostController::class, 'search'])->name('search');

Route::get('/recommended-job', [PostController::class, 'getRecommendedJob']);
Route::get('/', [PostController::class, 'home'])->name('home');
