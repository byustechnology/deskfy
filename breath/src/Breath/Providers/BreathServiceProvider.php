<?php

namespace Breath\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class BreathServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Setting the paginator to use Bootstrap template
        Paginator::useBootstrap();

        // Loading the views
        $this->loadViewsFrom(__DIR__ . '/../../views', 'breath');

        Blade::componentNamespace('Breath\\View\\Components', 'breath');
        
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
        $this->mergeConfigFrom(__DIR__ . '/../../config/breath.php', 'breath');
    }
}