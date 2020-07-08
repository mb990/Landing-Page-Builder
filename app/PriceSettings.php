<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceSettings extends Model
{
    protected $fillable = [
        'name', 'yearly_price', 'monthly_price', 'discount_amount'
    ];

    public function pageElement()
    {
        return $this->morphOne(PageElement::class, 'page_elementable');
    }
}
