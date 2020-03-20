<?php

namespace Famdirksen\LaravelGoogleIndexing\ServiceProvider;

use Illuminate\Support\ServiceProvider;

class LaravelGoogleIndexingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/config.php' => config_path('laravel-google-indexing.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/config.php', 'laravel-google-indexing');
    }
}
