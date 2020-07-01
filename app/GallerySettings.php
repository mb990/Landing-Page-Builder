<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GallerySettings extends Model
{
    public function pageElement()
    {
        return $this->morphOne(PageElement::class, 'page_elementable');
    }
}
