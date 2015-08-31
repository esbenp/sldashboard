<?php

namespace App\Providers\Service;

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
        $this->app->bind('App\Service\UserService', 'App\Service\UserService');
    }
}
