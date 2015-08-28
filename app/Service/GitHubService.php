<?php

namespace App\Service;

use Laravel\Socialite\SocialiteManager;

class GitHubService
{
    /** @var SocialiteManager */
    protected $socialite;

    public function __construct(SocialiteManager $socialite)
    {
        $this->socialite = $socialite;
    }

    /**
     * Login to GitHub
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login()
    {
        $driver = $this->getDriver()
            ->with(['redirect_uri' => env('GITHUB_CALLBACK_URL' )]);

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
}
