<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PricingSection extends Model
{
    protected $fillable = [
        'blade_file'
    ];

    public function pageElement()
    {
        return $this->morphOne(PageElement::class, 'page_elementable');
    }
}
