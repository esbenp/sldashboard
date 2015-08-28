<?php

namespace App\Http\Controllers;

use App\Facades\Service\InstallationServiceFacade as InstallationService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function validateInstallation()
    {
        if (InstallationService::isInstalled()) {
            return redirect('/dashboard');
        }

        die('Must install');
    }
}
