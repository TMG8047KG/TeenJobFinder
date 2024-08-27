<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\Post;
use App\Models\User;
use App\Policies\CompanyPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('createCompany', [CompanyPolicy::class, 'create']);
        $posts = Post::all();
        View::share('posts', $posts);
    }
}
