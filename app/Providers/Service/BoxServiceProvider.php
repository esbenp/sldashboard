<?php

namespace App\Providers\Service;

use App\Service\BoxService;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class BoxServiceProvider extends ServiceProvider
{
    /**
     * Register service
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Service\BoxService', function(Application $application) {
            return new BoxService();
        });
    }
}
