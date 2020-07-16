<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GallerySettings extends Model
{

    protected $with = ['imageItems', 'videoItems'];

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
}
