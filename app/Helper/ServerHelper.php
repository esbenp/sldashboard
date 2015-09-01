<?php

namespace App\Helper;

use App\Service\ServerService;

class ServerHelper
{
    /** @var ServerService */
    protected $serverService;

    /**
     * @param ServerService $serverService
     */
    public function __construct(ServerService $serverService)
    {
        $this->serverService = $serverService;
    }

    /**
     * Get server status
     *
     * @param $url
     * @return array
     */
    public function serverStatus($url)
    {
        return $this->serverService->serverStatus($url);
    }
}
