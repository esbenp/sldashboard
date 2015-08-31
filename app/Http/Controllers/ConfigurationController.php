<?php

namespace App\Http\Controllers;

use App\Service\BoxService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ConfigurationController extends Controller
{
    /** @var BoxService */
    protected $boxService;

    public function __construct(BoxService $boxService)
    {
        $this->boxService = $boxService;
    }

    public function index()
    {
        return view('configuration.index');
    }

    public function dashboard()
    {
        $boxService = $this->boxService;

        $positions = $boxService->allPositions();
        $types = $boxService->allTypes();

        return view('configuration.dashboard', [
            'positions' => $positions,
            'types' => $types,
        ]);
    }
}
