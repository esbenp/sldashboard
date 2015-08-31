<?php

namespace App\Models\Box;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
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

    public function boxes()
    {
        return $this->hasMany('App\Models\Box\Box', 'type_id');
    }
}
