<?php

namespace App\Http\Controllers;

use App\Service\GitHubService;
use App\Service\InstallationService;
use App\Service\UserService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InstallationController extends Controller
{
    /** @var InstallationService */
    protected $installationService;

    /** @var UserService */
    protected $userService;

    /** @var GitHubService */
    protected $gitHubService;

    public function __construct(
        InstallationService $installationService,
        UserService $userService,
        GitHubService $gitHubService
    ) {
        $this->installationService = $installationService;
        $this->userService = $userService;
        $this->gitHubService = $gitHubService;
    }

    public function config()
    {
        if ($this->installationService->getInstallation()) {
            return redirect('/install/user');
        }

        return view('installation.config');
    }

    public function configStore(Request $request)
    {
        $content = $request->all();

        if (!$this->installationService->create($content)) {
            // Config was not created
            return view('installation.config', ['data' => $content]);
        }

        // Success

        return redirect('/install/user');
    }

    public function user()
    {
        if ($this->userService->getUser()) {
            // Already created user
            return redirect('/');
        }

        return view('installation.user');
    }

    public function userStore(Request $request)
    {
        $content = $request->all();

        if (!$this->userService->create($content)) {
            // User was not created
            return view('installation.user');
        }

        // Success
        $this->installationService->setInstalled(true);

        return redirect('/');
    }

    public function github()
    {
        return $this->gitHubService->login();
    }
}
