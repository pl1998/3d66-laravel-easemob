<?php

declare(strict_types=1);


namespace Tepeng\LaravelEasemob;

use Illuminate\Support\ServiceProvider;

class LaravelEasemobServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // register merge config/auth.php
        $this->mergeConfigFrom(
            __DIR__.'/../config/im.php', 'im'
        );
    }

    public function boot(): void
    {
        $this->publishes([__DIR__.'/../config/im.php' => config_path('im.php')]);
    }
}
