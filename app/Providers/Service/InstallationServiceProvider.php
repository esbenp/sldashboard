<?php

namespace App\Providers\Service;

use App\Service\InstallationService;
use Illuminate\Foundation\Application;
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
        $this->app->bind('App\Service\InstallationService', function(Application $application) {
            return new InstallationService();
        });
    }
}
