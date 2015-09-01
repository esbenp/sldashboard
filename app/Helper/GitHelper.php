<?php

namespace App\Helper;

use App\Service\GitHubService;
use App\Service\GitServiceInterface;

class GitHelper
{
    /** @var GitServiceInterface */
    protected $gitHubService;

    public function __construct(GitServiceInterface $gitHubService)
    {
        $this->gitHubService = $gitHubService;
    }

    /**
     * @param string $service
     * @param string $repository
     * @param \stdClass|null $data
     * @return array
     */
    public function commits($service, $repository, $data = null)
    {
        switch ($service) {
            case 'gitHub':
            default:
                return $this->gitHubService->commits($repository, $data);
                break;
        }
    }

    /**
     * Check if git service is connected
     *
     * @param null $service
     * @return bool
     */
    public function isConnected($service = null)
    {
        switch ($service) {
            case 'gitHub':
            default:
                return $this->gitHubService->isConnected();
                break;
        }
    }

    public function getRepositories($service)
    {
        switch ($service) {
            case 'gitHub':
            default:
                return $this->gitHubService->getRepositories();
                break;
        }
    }
}