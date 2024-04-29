<?php

declare(strict_types=1);


namespace Tepeng\LaravelEasemob;

use Illuminate\Support\ServiceProvider;
use Tepeng\LaravelEasemob\Api\Commands\AppTokenClearCommand;

class LaravelEasemobServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register(): void
    {
        // register merge config/auth.php
        $this->mergeConfigFrom(
            __DIR__.'/../config/im.php', 'im'
        );
    }

    /**
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([__DIR__.'/../config/im.php' => config_path('im.php')]);
        if ($this->app->runningInConsole()) {
            $this->commands([
                AppTokenClearCommand::class
            ]);
        }
    }
}
