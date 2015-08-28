<?php

namespace App\Providers\Service;

use App\Service\GitHubService;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class GitHubServiceProvider extends ServiceProvider
{
    /**
     * Register service
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Service\GitHubService', function(Application $application) {
            /** @var \Laravel\Socialite\SocialiteManager $socialite */
            $socialite = $application['Laravel\Socialite\Contracts\Factory'];

            return new GitHubService($socialite);
        });
    }
}
