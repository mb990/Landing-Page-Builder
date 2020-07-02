<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopMenuSettings extends Model
{
    public function pageElement()
    {
        return $this->morphOne(PageElement::class, 'page_elementable');
    }

    public function links()
    {
        return $this->hasMany(TopMenuLink::class);
    }
}
