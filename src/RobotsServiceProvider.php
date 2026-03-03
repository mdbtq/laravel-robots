<?php

namespace Mdbtq\Robots;

use Illuminate\Support\ServiceProvider;

class RobotsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/robots.php', 'robots');
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/robots.php' => config_path('robots.php'),
        ], 'robots-config');

        $this->loadRoutesFrom(__DIR__ . '/routes.php');
    }
}
