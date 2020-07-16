<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryImageItem extends Model
{
    protected $fillable = [
        'gallery_settings_id', 'blade_file'
    ];

    protected $with = ['image'];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function gallery()
    {
        return $this->belongsTo(GallerySettings::class);
    }
}
