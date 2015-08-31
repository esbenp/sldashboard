<?php

namespace App\Providers\Controller;

use App\Http\Controllers\DashboardController;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class DashboardControllerProvider extends ServiceProvider
{
    /**
     * Register controller
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Http\Controllers\DashboardController', function(Application $application) {
            /** @var \App\Service\InstallationService $installationService */
            $installationService = $application->make('App\Service\InstallationService');

            return new DashboardController($installationService);
        });
    }
}
