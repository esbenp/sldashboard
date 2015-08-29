<?php

namespace App\Service;

use App\Models\Config;

class InstallationService
{
    /**
     * Check if the installation is installed
     *
     * @return bool
     */
    public function isInstalled()
    {
        $config = $this->getInstallation();

        if (is_null($config)) {
            return false;
        }

        return $config->installed;
    }

    /**
     * Set installation flag
     *
     * @param $isInstalled
     * @return bool
     */
    public function setInstalled($isInstalled)
    {
        $installation = $this->getInstallation();

        if (!is_bool($isInstalled) || !$installation) {
            return false;
        }

        $installation->installed = true;

        return $this->save($installation);
    }

    /**
     * Save user
     *
     * @param array $data
     * @return bool
     */
    public function create(array $data)
    {
        // Check if necessary data is set
        if (!isset($data['siteName']) || !isset($data['siteUrl']) || !isset($data['email'])) {
            return false;
        }

        $config = new Config();
        $config->siteName = $data['siteName'];
        $config->siteUrl = $data['siteUrl'];
        $config->email = $data['email'];
        $config->installed = false;

        return $this->save($config);
    }

    /**
     * Save config
     *
     * @param Config $config
     * @return bool
     */
    public function save(Config $config)
    {
        return $config->save();
    }

    /**
     * Find installation config
     *
     * @return Config|null
     */
    public function getInstallation()
    {
        /** @var Config|null $config */
        $config = Config::all()->first();

        return $config;
    }
}
