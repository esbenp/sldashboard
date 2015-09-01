<?php

namespace App\Service;

use App\Models\Git;
use Laravel\Socialite\SocialiteManager;

class GitHubService implements GitServiceInterface
{
    /** @var SocialiteManager */
    protected $socialite;

    public function __construct(SocialiteManager $socialite)
    {
        $this->socialite = $socialite;
    }

    public function commits($repository, $data)
    {
        list($author, $repository) = explode("/", $repository);

        $client = $this->getClient();

        $commits = array_slice($client->api('repo')->commits()->all($author, $repository, ['sha' => 'master']), 0, $data->commits);

        return $commits;
    }

    /**
     * Get form repositories
     *
     * @return array
     */
    public function getFormRepositories()
    {
        $returnArray = [];

        foreach($this->getRepositories() as $repository) {
            $returnArray[] = [
                'label' => $repository['name'],
                'value' => $repository['name']
            ];
        }

        return $returnArray;
    }

    /**
     * Get repositories
     *
     * @return array
     */
    public function getRepositories()
    {
        if (!$this->isConnected()) {
            return [];
        }

        $client = $this->getClient();

        /** @var \Github\Api\CurrentUser: $currentUser */
        $currentUser = $client->currentUser();

        $repositories = [];

        foreach($currentUser->repositories() as $repository) {
            $repositories[] = $this->repositoryResponseToArray($repository);
        }

        // Organization repositories
        $organizations = $currentUser->organizations();

        foreach ($organizations as $organization) {
            $repositories = array_merge($repositories, $this->getOrganizationRepositories($organization['repos_url']));
        }

        return $repositories;
    }

    /**
     * Repository url to array
     *
     * @param string $url
     * @return array
     * @throws \Github\Exception\ErrorException
     */
    public function getOrganizationRepositories($url)
    {
        $client = $this->getClient();
        $request = $client->getHttpClient()->request($url);

        $response = json_decode($request->getBody());

        $repositories = [];

        foreach ($response as $repository) {
            $repositories[] = $this->repositoryResponseToArray($repository);
        }

        return $repositories;
    }

    /**
     *
     * Repository response to array
     *
     * @param \stdClass|array $response
     * @return array
     */
    public function repositoryResponseToArray($response)
    {
        if (is_array($response)) {
            return [
                'name' => $response['full_name'],
            ];
        }

        return [
            'name' => $response->full_name,
        ];
    }

    /**
     * Get client
     *
     * @return \Github\Client
     */
    public function getClient()
    {
        $client = new \Github\Client();
        $client->authenticate($this->getAccessToken(), null, $client::AUTH_HTTP_TOKEN);

        return $client;
    }

    /**
     * Save config
     *
     * @param array $data
     * @return bool
     */
    public function save(array $data)
    {
        if (!$config = $this->getConfig()) {
            $config = new Git();
            $config->service = 'gitHub';
        }

        $config->data = json_encode($data);

        return $config->save();
    }

    /**
     * Check if Github is connected
     *
     * @return bool
     */
    public function isConnected()
    {
        if ($this->getConfig()) {
            return true;
        }

        return false;
    }

    /**
     * Get git config
     *
     * @return null
     */
    public function getConfig()
    {
        if ($config = Git::where('service', 'gitHub')->first()) {
            return $config;
        }

        return null;
    }

    /**
     * Connect to GitHub
     *
     * @param $callBackUrl
     * @return \Illuminate\Http\RedirectResponse
     */
    public function connect($callBackUrl)
    {
        $driver = $this->getDriver()
            ->with(['redirect_uri' => $callBackUrl]);

        return $driver->redirect();
    }

    /**
     * Get GitHub Driver
     *
     * @return \Laravel\Socialite\Two\GithubProvider
     */
    protected function getDriver()
    {
        /** @var \Laravel\Socialite\Two\GithubProvider $driver */
        $driver = $this->socialite->driver('github');

        // Set scopes
        $driver->scopes(['user:email', 'public_repo', 'repo']);

        return $driver;
    }

    /**
     * Create access token
     */
    public function createAccessToken()
    {
        $driver = $this->getDriver();

        $config = $this->getConfig();

        $data = json_decode($config->data, true);

        $data['token'] = $driver->getAccessToken($data['code']);

        $this->save($data);
    }

    /**
     * Get access token
     *
     * @return string
     */
    public function getAccessToken()
    {
        $config = $this->getConfig();
        $data = json_decode($config->data);

        return $data->token;
    }
}
