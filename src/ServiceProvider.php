<?php

namespace Stahiralijan\Stringer;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    const CONFIG_PATH = __DIR__ . '/../config/stringer.php';

    public function boot()
    {
        $this->publishes([
            self::CONFIG_PATH => config_path('stringer.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            self::CONFIG_PATH,
            'stringer'
        );

        $this->app->bind('stringer', function () {
            return new Stringer();
        });
    }
}
