<?php

namespace App;

use Cesargb\Database\Support\CascadeDelete;
use Illuminate\Database\Eloquent\Model;

class TopMenuSettings extends Model
{
    use CascadeDelete;

    protected $with = ['links', 'image'];

    protected $cascadeDeleteMorph = ['pageElement', 'image'];

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
