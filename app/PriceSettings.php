<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceSettings extends Model
{
    public function pageElement()
    {
        return $this->morphOne(PageElement::class, 'page_elementable');
    }

    public function plans()
    {
        return $this->hasMany(Pricing::class);
    }
}
