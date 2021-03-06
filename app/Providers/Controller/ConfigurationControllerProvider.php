<?php

namespace App\Providers\Controller;

use App\Http\Controllers\ConfigurationController;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class ConfigurationControllerProvider extends ServiceProvider
{
    /**
     * Register controller
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Http\Controllers\ConfigurationController', function(Application $application) {
            /** @var \App\Service\BoxService $boxService */
            $boxService = $application->make('App\Service\BoxService');

            /** @var \App\Service\GitHubService $gitHubService */
            $gitHubService = $application->make('App\Service\GitHubService');

            return new ConfigurationController($boxService, $gitHubService);
        });
    }
}