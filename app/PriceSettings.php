<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceSettings extends Model
{
    protected $fillable = [
        'plan_name', 'price', 'discount', 'discount_amount'
    ];

    public function pageElements()
    {
        return $this->morphMany(PageElement::class, 'page_elementable');
    }
}
