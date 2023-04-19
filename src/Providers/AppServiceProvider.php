<?php

namespace Itecschool\AuditPkg\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        
        $this->mergeConfigFrom(__DIR__ . '/../../config/itecschoolauditpkg.php', 'itecschoolauditpkg');

    }

    public function boot()
    {
        
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'itecschoolauditpkg');

        if ($this->app->runningInConsole()) {
            
            // $this->publishes([__DIR__.'/../../resources/views' => resource_path('views/vendor/itecschoolauditpkg'),], 'views');

            // $this->publishes([__DIR__.'/../../config/itecschoolauditpkg.php' => config_path('itecschoolauditpkg.php')], 'config');

        }

    }
    
}