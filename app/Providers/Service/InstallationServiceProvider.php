<?php

namespace App\Providers\Service;

use Illuminate\Support\ServiceProvider;

class InstallationServiceProvider extends ServiceProvider
{
    /**
     * Register service
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Service\InstallationService', 'App\Service\InstallationService');
    }
}
