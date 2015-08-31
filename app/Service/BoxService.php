<?php

namespace App\Service;

use App\Models\Box\Position;
use App\Models\Box\Type;

class BoxService
{
    /**
     * Find all positions
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function allPositions()
    {
        return Position::all();
    }

    public function allTypes()
    {
        return Type::all();
    }
}
