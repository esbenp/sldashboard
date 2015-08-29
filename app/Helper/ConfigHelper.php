<?php

namespace App\Helper;

use App\Models\Config;

class ConfigHelper
{
    /**
     * Get site name
     *
     * @return string
     */
    public function getSiteName()
    {
        return $this->getConfig()->siteName;
    }
    /**
     * Get site url
     *
     * @return string
     */
    public function getSiteUrl()
    {
        return $this->getConfig()->siteUrl;
    }

    /**
     * @return Config
     */
    protected function getConfig()
    {
        return Config::all()->first();
    }
}
