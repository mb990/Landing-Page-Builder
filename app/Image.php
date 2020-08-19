<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Image
 * @package App
 */
class Image extends Model
{
    protected $fillable = [
        'filename', 'imageable_id', 'imageable_type'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function imageable()
    {
        return $this->morphTo();
    }
}
