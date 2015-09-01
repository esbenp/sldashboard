<?php

namespace App\Providers\Helper;

use Illuminate\Support\ServiceProvider;

class FormHelperProvider extends ServiceProvider
{
    /**
     * Register helper
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Provider\Helper\FormHelperProvider', 'App\Helper\FormHelper');
    }
}
