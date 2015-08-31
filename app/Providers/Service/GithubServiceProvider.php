<?php
namespace App\Providers\Service;

use Illuminate\Support\ServiceProvider;
use App\Service\GitHubService;
use Illuminate\Foundation\Application;

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
