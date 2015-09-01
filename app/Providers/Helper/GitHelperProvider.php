<?php

namespace App\Providers\Helper;

use App\Helper\GitHelper;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Application;

class GitHelperProvider extends ServiceProvider
{
    /**
     * Register helper
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Provider\Helper\GitHelperProvider', function(Application $application) {
            /** @var \App\Service\GitHubService $gitHubService */
            $gitHubService = $application->make('App\Service\GitHubService');

            return new GitHelper($gitHubService);
        });
    }
}
