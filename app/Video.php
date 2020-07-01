<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'url', 'gallery_settings_id'
    ];

    public function gallery()
    {
        return $this->belongsTo(GallerySettings::class);
    }
}
