<?php

namespace Famdirksen\LaravelGoogleIndexing\ServiceProvider;

use Famdirksen\LaravelGoogleIndexing\LaravelGoogleIndexing;
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

        $this->app->bind('laravel_google_indexing',function(){
            return new LaravelGoogleIndexing();
        });
    }
}
