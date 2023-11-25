<?php

namespace App\Providers;

use Illuminate\Routing\UrlGenerator; // https://render.com/docs/deploy-php-laravel-docker
use Illuminate\Support\Facades\Schema; // https://www.quora.com/Why-does-the-PHP-artisan-migrate-command-not-create-new-tables-in-my-database-except-by-default-tables-users-migrations-and-password-resets
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        if (env('APP_ENV') == 'production') {
            $this->app['request']->server->set('HTTPS', true);
        }
    }
}
