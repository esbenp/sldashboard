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

    /**
     * Get boxes
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function boxes()
    {
        return $this->hasMany('App\Models\Box\Box', 'type_id');
    }

    /**
     * Get format as object
     *
     * @return \stdClass
     */
    public function formatAsObject()
    {
        if (is_null($this->format)) {
            return [];
        }

        $object = json_decode($this->format, true);

        if (!$object = json_decode($this->format, true)) {
            return new \Exception('Type format is not JSON');
        }

        return $object;
    }
}
