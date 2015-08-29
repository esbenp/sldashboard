<?php

namespace App\Http\Controllers;

use App\Facades\Service\GitHubServiceFacade;
use App\Facades\Service\InstallationServiceFacade;
use App\Facades\Service\UserServiceFacade;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InstallationController extends Controller
{
    public function config(Request $request)
    {
        if (InstallationServiceFacade::getInstallation()) {
            return redirect('/install/user');
        }

        return view('installation.config');
    }

    public function configStore(Request $request)
    {
        $content = $request->all();

        if (!InstallationServiceFacade::create($content)) {
            // Config was not created
            return view('installation.config', ['data' => $content]);
        }

        // Success

        return redirect('/install/user');
    }

    public function user()
    {
        if (UserServiceFacade::getUser()) {
            // Already created user
            return redirect('/');
        }

        return view('installation.user');
    }

    public function userStore(Request $request)
    {
        $content = $request->all();

        if (!UserServiceFacade::create($content)) {
            // User was not created
            return view('installation.user');
        }

        // Success
        InstallationServiceFacade::setInstalled(true);

        return redirect('/');
    }

    public function github()
    {
        return GitHubServiceFacade::login();
    }
}
