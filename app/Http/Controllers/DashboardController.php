<?php

namespace App\Http\Controllers;

use App\Service\InstallationService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /** @var InstallationService */
    protected $installationService;

    public function __construct(InstallationService $installationService)
    {
        $this->installationService = $installationService;
    }

    public function index()
    {
        return view('dashboard.index');
    }

    public function validateInstallation()
    {
        if ($this->installationService->isInstalled()) {
            return redirect('/dashboard');
        }

        return redirect('/install');
    }
}
