<?php

namespace App\Http\Controllers;

use App\Facades\Service\GitHubServiceFacade;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InstallController extends Controller
{
    public function index()
    {
    }

    public function github()
    {
        return GitHubServiceFacade::login();
    }
}
