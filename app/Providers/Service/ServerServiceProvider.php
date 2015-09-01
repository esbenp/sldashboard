<?php

namespace App\Providers\Service;

use Illuminate\Support\ServiceProvider;

class ServerServiceProvider extends ServiceProvider
{
    /**
     * Register service
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Service\ServerService', 'App\Service\ServerService');
    }
}
