<?php

namespace App\Helper;

use App\Service\BoxService;
use Illuminate\Support\Facades\View;

class DashboardHelper
{
    /** @var BoxService */
    protected $boxService;

    /**
     * @param BoxService $boxService
     */
    public function __construct(BoxService $boxService)
    {
        $this->boxService = $boxService;
    }

    /**
     * Get html for position
     *
     * @param string $positionName
     * @return null|string
     */
    public function showPosition($positionName)
    {
        $boxService = $this->boxService;
        $position = $boxService->findPositionByName($positionName);

        $html = null;

        foreach ($position->boxes() as $box) {
            $type = $box->type();
            $data = json_decode($box->data);

            $html .= View::make('dashboard.boxes.' . $type->partial)->with('data', $data);
        }

        return $html;
    }
}