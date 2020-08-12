<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryVideoItem extends Model
{
    protected $fillable = [
        'gallery_settings_id', 'blade_file', 'url', 'filename'
    ];

    protected $with = ['gallery'];

    public function gallery()
    {
        return $this->belongsTo(GallerySettings::class);
    }
}
