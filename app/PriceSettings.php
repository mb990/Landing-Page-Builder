<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceSettings extends Model
{
    protected $fillable = [
        'name', 'yearly_price', 'monthly_price', 'discount_amount', 'pricing_section_id', 'blade_file'
    ];

    public function pricingSection()
    {
        return $this->belongsTo(PricingSection::class);
    }

    public function benefits()
    {
        return $this->hasMany(PricingSettingsBenefit::class);
    }

//    public function pageElement()
//    {
//        return $this->morphOne(PageElement::class, 'page_elementable');
//    }
}
