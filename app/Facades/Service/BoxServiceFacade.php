<?php

namespace App\Facades\Service;

use Illuminate\Support\Facades\Facade;

class BoxServiceFacade extends Facade
{
    /**
     * Name of the binding container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'App\Service\BoxService';
    }
}