<?php

namespace App\Providers\Service;

use App\Service\UserService;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register service
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Service\UserService', function(Application $application) {
            return new UserService();
        });
    }
}
