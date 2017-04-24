<?php

namespace iscms\Alisms;

use Illuminate\Support\ServiceProvider;

class AlidayuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/alisms.php' => config_path('alisms.php'),
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SendSmsApi::class, SendsmsPusher::class);
        $this->app->singleton('alisms', function ($app) {
            return $app->make(SendSmsApi::class);
        });
    }

    public function provides()
    {
        return ['alisms'];
    }
}
