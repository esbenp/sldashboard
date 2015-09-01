<?php

namespace App\Providers\Helper;

use App\Helper\ServerHelper;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Application;

class ServerHelperProvider extends ServiceProvider
{
    /**
     * Register helper
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Provider\Helper\ServerHelperProvider', function(Application $application) {
            /** @var \App\Service\ServerService $ServerService */
            $serverService = $application->make('App\Service\ServerService');

            return new ServerHelper($serverService);
        });
    }
}
