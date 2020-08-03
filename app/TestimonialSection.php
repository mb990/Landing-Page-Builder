<?php

namespace App;

use Cesargb\Database\Support\CascadeDelete;
use Illuminate\Database\Eloquent\Model;

class TestimonialSection extends Model
{
    use CascadeDelete;

    protected $with = ['singleItems'];

    protected $cascadeDeleteMorph = ['pageElement'];

    public function pageElement()
    {
        return $this->morphOne(PageElement::class, 'page_elementable');
    }

    public function singleItems()
    {
        return $this->hasMany(TestimonialSettings::class);
    }
}
