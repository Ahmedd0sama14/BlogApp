<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Repositories\Contracts\BlogContract::class,
            \App\Repositories\SQL\BlogRepository::class
        );

        $this->app->bind(
            \App\Repositories\Contracts\CategoryContract::class,
            \App\Repositories\SQL\CategoryRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
