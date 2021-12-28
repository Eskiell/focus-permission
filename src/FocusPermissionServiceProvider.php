<?php

namespace Eskiell\FocusPermission;

use Illuminate\Support\ServiceProvider;

class FocusPermissionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
         $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/permission.php' => config_path('focus-permission.php'),
            ], 'config');
        }
    }
    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/permission.php', 'focus-permission');
        $this->app->singleton('focus-permission', function () {
            return new FocusPermission;
        });
    }
}
