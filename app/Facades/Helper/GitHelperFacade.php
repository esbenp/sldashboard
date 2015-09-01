<?php

namespace App\Facades\Helper;
use Illuminate\Support\Facades\Facade;

class GitHelperFacade extends Facade
{
    /**
     * Name of the binding container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'App\Provider\Helper\GitHelperProvider';
    }
}
