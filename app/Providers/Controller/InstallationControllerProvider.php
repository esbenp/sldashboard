<?php

namespace App\Providers\Controller;

use App\Http\Controllers\InstallationController;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class InstallationControllerProvider extends ServiceProvider
{
    /**
     * Register controller
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Http\Controllers\InstallationController', function(Application $application) {
            /** @var \App\Service\InstallationService $installationService */
            $installationService = $application->make('App\Service\InstallationService');

            /** @var \App\Service\UserService $userService */
            $userService = $application->make('App\Service\UserService');

            /** @var \App\Service\GitHubService $gitHubService */
            $gitHubService = $application->make('App\Service\GitHubService');

            return new InstallationController($installationService, $userService, $gitHubService);
        });
    }
}