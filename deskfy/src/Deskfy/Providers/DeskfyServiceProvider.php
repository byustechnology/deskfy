<?php

namespace Deskfy\Providers;

use Illuminate\Support\ServiceProvider;

class DeskfyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Loading the views
        $this->loadViewsFrom(__DIR__ . '/../../views', 'deskfy');
        
        // Loading migrations
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations/');
        
        // Loading routes
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/deskfy.php', 'deskfy');
    }
}