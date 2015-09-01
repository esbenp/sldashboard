<?php

namespace App\Providers\Helper;

use App\Helper\DashboardHelper;
use Illuminate\Support\ServiceProvider;

class DashboardHelperProvider extends ServiceProvider
{
    /**
     * Register helper
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Provider\Helper\DashboardHelperProvider', function($application) {
            /** @var \App\Service\BoxService $boxService */
            $boxService = $application->make('App\Service\BoxService');

            return new DashboardHelper($boxService);
        });
    }
}
