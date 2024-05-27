<?php

namespace Mdlb\Chokidar;

use Illuminate\Support\ServiceProvider;

class ChokidarServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '../config/chokidar.php', 'chokidar');
    }

    protected function registerCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\StartWatchCommand::class,
            ]);
        }
    }

    protected function registerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/chokidar.php' => config_path('chokidar.php'),
            ], 'chokidar-config');
        }
    }
}
