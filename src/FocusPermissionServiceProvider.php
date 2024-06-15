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
        // Carregar as migrations do pacote
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        if ($this->app->runningInConsole()) {
            // Publicar o arquivo de configuração
            $this->publishes([
                __DIR__ . '/../config/permission.php' => config_path('focus-permission.php'),
            ], 'config');

            // Publicar as migrations
            $this->publishes([
                __DIR__ . '/../database/migrations' => database_path('migrations'),
            ], 'migrations');

            // Registrar comandos de console, se houver
            $this->commands([
                Commands\PermissionsGenerate::class
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Mesclar configurações
        $this->mergeConfigFrom(__DIR__ . '/../config/permission.php', 'focus-permission');
        
        // Registrar um singleton no container de serviço
        $this->app->singleton('focus-permission', function () {
            return new FocusPermission;
        });
    }
}
