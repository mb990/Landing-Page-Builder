<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PricingSection extends Model
{

    protected $with = ['singleItems'];

    public function pageElement()
    {
        return $this->morphOne(PageElement::class, 'page_elementable');
    }

    public function singleItems()
    {
        return $this->hasMany(PriceSettings::class);
    }
}
