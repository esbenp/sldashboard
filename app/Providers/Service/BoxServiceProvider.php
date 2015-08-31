<?php
namespace App\Providers\Service;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Application;

class BoxServiceProvider extends ServiceProvider
{
    /**
     * Register service
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Service\GitHubService', 'App\Service\BoxService');
    }
}
