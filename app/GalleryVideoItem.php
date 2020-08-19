<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GalleryVideoItem
 * @package App
 */
class GalleryVideoItem extends Model
{
    protected $fillable = [
        'gallery_settings_id', 'blade_file', 'url', 'filename'
    ];

    protected $with = ['gallery'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gallery()
    {
        return $this->belongsTo(GallerySettings::class);
    }
}
