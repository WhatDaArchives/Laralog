<?php

namespace Laralog;

use Illuminate\Support\ServiceProvider;

/**
 * Class LaralogServiceProvider
 * @package Laralog
 */
class LaralogServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/laralog.php' => config_path('laralog.php'),
        ], 'laralog');

        $this->registerLoggingHandlers();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/laralog.php', 'laralog'
        );
    }

    /**
     * Register logging handlers according to config
     */
    private function registerLoggingHandlers()
    {
        $this->app->log->listen(function () {
            $service = new LogService(
                $this->app->log->getMonolog(),
                config("laralog.environments.{$this->app->environment()}", [])
            );

            $service->pushHandlers();
        });
    }
}