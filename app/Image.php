<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'url', 'filename'
    ];

    public function imageable()
    {
        return $this->morphTo();
    }
}
