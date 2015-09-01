<?php

namespace App\Http\Controllers;

use App\Service\BoxService;
use App\Service\GitHubService;
use App\Service\UserService;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ConfigurationController extends Controller
{
    private $app;

    /** @var BoxService */
    protected $boxService;

    /** @var GitHubService */
    protected $gitHubService;

    private $userService;

    public function __construct(
        Application $app,
        BoxService $boxService,
        GitHubService $gitHubService,
        UserService $userService)
    {
        $this->app = $app;
        $this->boxService = $boxService;
        $this->gitHubService = $gitHubService;
        $this->userService = $userService;
    }

    public function index()
    {
        return view('configuration.index');
    }

    public function personal()
    {
        return view('configuration.user.personal', [
            'user' => $this->app['auth']->user()
        ]);
    }

    public function savePersonalSettings(Request $request)
    {
        $user = $this->app['auth']->user();

        if ($user === null) {
            return redirect('auth/login');
        }

        $response = $this->userService->update($user->id, $request->get('user', []));

        if (isset($response['error'])) {
            return view('configuration.user.personal', [
                'error' => $response['error'],
                'user' => $user
            ]);
        }

        return view('configuration.user.personal', [
            'msg' => _('Your settings were saved!'),
            'user' => $user
        ]);
    }

    public function dashboard(Request $request)
    {
        $boxService = $this->boxService;

        $positions = $boxService->allPositions();
        $types = $boxService->allTypes();

        if ($id = $request->get('remove')) {
            $box = $boxService->find($id);
            $boxService->remove($box);

            return redirect('configuration/dashboard');
        }

        return view('configuration.dashboard.overview', [
            'positions' => $positions,
            'types' => $types,
        ]);
    }

    public function dashboardBox($positionId, $typeId)
    {
        $boxService = $this->boxService;

        $type = $boxService->findType($typeId);
        $position = $boxService->findPosition($positionId);

        if (!$type || !$position) {
            return redirect('configuration/dashboard');
        }

        return view('configuration.dashboard.create', [
            'type' => $type,
        ]);
    }

    public function dashboardBoxStore($positionId, $typeId, Request $request)
    {
        $boxService = $this->boxService;

        $type = $boxService->findType($typeId);
        $position = $boxService->findPosition($positionId);

        if (!$type || !$position) {
            return redirect('configuration/dashboard');
        }

        $data = $request->except(['_token', 'submit']);

        if (!$box = $boxService->create($position, $type, $data)) {
            return new \Exception('The box could not be created');
        }

        return redirect('configuration/dashboard');
    }

    public function gitHub(Request $request)
    {
        $gitHubService = $this->gitHubService;

        // Connect
        if ($request->get('connect')) {
            return $gitHubService->connect(url('configuration/git/github'));
        }

        // Callback
        if ($request->get('code')) {
            $data = [
                'code' => $request->get('code'),
                'state' => $request->get('state')
            ];

            $gitHubService->save($data);
            $gitHubService->createAccessToken();

            return redirect('configuration/git/github');
        }

        return view('configuration.git.github');
    }
}
