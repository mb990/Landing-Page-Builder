<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    protected $fillable = [
        'plan_name', 'price', 'discount', 'discount_amount', 'pricing_settings_id'
    ];

    public function pricingSection()
    {
        return $this->belongsTo(PriceSettings::class);
    }
}
