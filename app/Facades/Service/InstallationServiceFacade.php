<?php

namespace App\Facades\Service;

use Illuminate\Support\Facades\Facade;

class InstallationServiceFacade extends Facade
{
    /**
     * Name of the binding container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'App\Service\InstallationService';
    }
}