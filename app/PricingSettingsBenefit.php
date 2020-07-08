<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PricingSettingsBenefit extends Model
{
    protected $fillable = [
        'description', 'price_settings_id'
    ];

    public function pricingPlan()
    {
        return $this->belongsTo(PriceSettings::class);
    }
}
