<?php

namespace App;

use Cesargb\Database\Support\CascadeDelete;
use Illuminate\Database\Eloquent\Model;

class GallerySettings extends Model
{
    use CascadeDelete;

    protected $with = ['imageItems', 'videoItems'];

    protected $cascadeDeleteMorph = ['pageElement'];

    public function pageElement()
    {
        return $this->morphOne(PageElement::class, 'page_elementable');
    }

    public function imageItems()
    {
        return $this->hasMany(GalleryImageItem::class);
    }

    public function videoItems()
    {
        return $this->hasMany(GalleryVideoItem::class);
    }

    public function hasImage()
    {
        return $this->imageItems()
            ->get();
    }

    public function hasVideo()
    {
        return $this->videoItems()
            ->get();
    }
}
