<?php

namespace App\Service;

interface GitServiceInterface
{
    /**
     * Get latest commits
     *
     * @param string $repository
     * @param \stdClass|null $data
     * @return array
     */
    public function commits($repository, $data);

    /**
     * Save connection data
     *
     * @param array $data
     * @return boolean
     */
    public function save(array $data);

    /**
     * Check if the git service is connected
     *
     * @return boolean
     */
    public function isConnected();

    /**
     * Get repositoires
     *
     * @return array
     */
    public function getRepositories();
}
