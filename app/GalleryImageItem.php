<?php

namespace App;

use Cesargb\Database\Support\CascadeDelete;
use Illuminate\Database\Eloquent\Model;

class GalleryImageItem extends Model
{
    protected $fillable = [
        'gallery_settings_id', 'blade_file'
    ];

    use CascadeDelete;

    protected $with = ['image'];

    protected $cascadeDeleteMorph = ['image'];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function gallery()
    {
        return $this->belongsTo(GallerySettings::class);
    }
}
