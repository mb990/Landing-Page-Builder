<?php

namespace App;

use Cesargb\Database\Support\CascadeDelete;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GalleryImageItem
 * @package App
 */
class GalleryImageItem extends Model
{
    protected $fillable = [
        'gallery_settings_id', 'blade_file'
    ];

    use CascadeDelete;

    protected $with = ['image', 'gallery'];

    protected $cascadeDeleteMorph = ['image'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gallery()
    {
        return $this->belongsTo(GallerySettings::class, 'gallery_settings_id')->with('pageElement');
    }
}
