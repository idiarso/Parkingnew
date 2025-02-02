<?php

namespace App\Providers;

use App\Services\AnprService;
use Illuminate\Support\ServiceProvider;

class ANPRServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(AnprService::class, function ($app) {
            return new AnprService(config('services.openalpr.key'));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}