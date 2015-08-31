<?php

namespace App\Providers\Helper;

use Illuminate\Support\ServiceProvider;

class ConfigHelperProvider extends ServiceProvider
{
    /**
     * Register helper
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Provider\Helper\ConfigHelperProvider', 'App\Helper\ConfigHelper');
    }
}
