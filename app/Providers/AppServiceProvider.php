<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('files', function () {
            return new Filesystem;
        });
    }

    public function boot()
    {
        if (!$this->app->runningInConsole()) {
            URL::forceScheme('https');
        }
    }
}