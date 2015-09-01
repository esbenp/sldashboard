<?php

namespace App\Models\Box;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Type extends Model
{
    /**
     * Disable auto increment
     *
     * @var bool
     */
    public $incrementing = false;

    protected $fillable = [
        'title',
        'slug',
        'icon',
        'format',
        'partial'
    ];

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
     * @return array|mixed
     * @throws \Exception
     */
    public function formatAsObject()
    {
        if (is_null($this->format)) {
            return [];
        }
        
        if (!$object = json_decode($this->format, true)) {
            throw new \Exception('Type format is not JSON');
        }

        return $object;
    }
}
