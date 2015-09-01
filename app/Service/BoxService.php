<?php

namespace App\Service;

use App\Models\Box\Box;
use App\Models\Box\Position;
use App\Models\Box\Type;

class BoxService
{
    /**
     * Find box from id
     *
     * @param string $id
     * @return Box|null
     */
    public function find($id)
    {
        return Box::find($id);
    }

    /**
     * Remove box
     *
     * @param Box $box
     * @return bool|null
     * @throws \Exception
     */
    public function remove(Box $box)
    {
        return $box->delete();
    }

    /**
     * Create box
     *
     * @param Position $position
     * @param Type $type
     * @param array $data
     * @return bool
     */
    public function create(Position $position, Type $type, array $data = [])
    {
        $box = new Box();

        $box->position_id = $position->id;
        $box->type_id = $type->id;
        $box->data = json_encode($data);

        return $this->save($box);
    }

    /**
     * Save box
     *
     * @param Box $box
     * @return bool
     */
    public function save(Box $box)
    {
        return $box->save();
    }

    /**
     * Find box type from id
     *
     * @param string $id
     * @return Type|null
     */
    public function findType($id)
    {
        return Type::find($id);
    }

    /**
     * Find position from id
     *
     * @param string $id
     * @return Position|null
     */
    public function findPosition($id)
    {
        return Position::find($id);
    }

    /**
     * Find position by name
     *
     * @param $name
     * @return Position|null
     */
    public function findPositionByName($name)
    {
        return Position::where('name', $name)->first();
    }

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
