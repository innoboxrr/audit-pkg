<?php

namespace Innoboxrr\LaravelAudit\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        
        $this->mergeConfigFrom(__DIR__ . '/../../config/laravel-audit.php', 'laravel-audit');

    }

    public function boot()
    {
        
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'innoboxrrlaravelaudit');

        if ($this->app->runningInConsole()) {
            
            // $this->publishes([__DIR__.'/../../resources/views' => resource_path('views/vendor/innoboxrrlaravelaudit'),], 'views');

            // $this->publishes([__DIR__.'/../../config/laravel-audit.php' => config_path('laravel-audit.php')], 'config');

        }

    }
    
}