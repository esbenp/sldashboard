<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use BoxService;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ConfigurationController extends Controller
{
    public function index()
    {
        return view('configuration.index');
    }

    public function dashboard()
    {
        /** @var \App\Service\BoxService $boxService */
        $boxService = BoxService::class;

        $positions = $boxService::allPositions();
        $types = $boxService::allTypes();

        return view('configuration.dashboard', [
            'positions' => $positions,
            'types' => $types,
        ]);
    }
}
