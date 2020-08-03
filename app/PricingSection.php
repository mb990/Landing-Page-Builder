<?php

namespace App;

use Cesargb\Database\Support\CascadeDelete;
use Illuminate\Database\Eloquent\Model;

class PricingSection extends Model
{
    use CascadeDelete;

    protected $cascadeDeleteMorph = ['pageElement'];

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
