<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopMenuSettings extends Model
{
    protected $with = ['links', 'image'];

    public function pageElement()
    {
        return $this->morphOne(PageElement::class, 'page_elementable');
    }

    public function links()
    {
        return $this->hasMany(TopMenuLink::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
