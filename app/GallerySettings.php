<?php

namespace App;

use Cesargb\Database\Support\CascadeDelete;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GallerySettings
 * @package App
 */
class GallerySettings extends Model
{
    use CascadeDelete;

    protected $with = ['imageItems', 'videoItems'];

    protected $cascadeDeleteMorph = ['pageElement'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function pageElement()
    {
        return $this->morphOne(PageElement::class, 'page_elementable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function imageItems()
    {
        return $this->hasMany(GalleryImageItem::class)->without('gallery');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function videoItems()
    {
        return $this->hasMany(GalleryVideoItem::class)->without('gallery');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function hasImage()
    {
        return $this->imageItems()
            ->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function hasVideo()
    {
        return $this->videoItems()
            ->get();
    }
}
