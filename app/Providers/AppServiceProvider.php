<?php

namespace App\Providers;

use App\Contracts\IRandomImageService;
use App\Contracts\IUserService;
use App\Services\RandomImageService;
use App\Services\UserServices;
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
        $this->app->bind(IUserService::class, UserServices::class);
        $this->app->bind(IRandomImageService::class, RandomImageService::class);
    }
}
