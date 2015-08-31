<?php

namespace App\Models\Box;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Box extends Model
{
    /**
     * Disable auto increment
     *
     * @var bool
     */
    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::generate(4);
        });
    }

    public function position()
    {
        return $this->hasOne('App\Models\Box\Position', 'id', 'position_id');
    }

    public function type()
    {
        return $this->hasOne('App\Models\Box\Type', 'id', 'type_id');
    }
}
