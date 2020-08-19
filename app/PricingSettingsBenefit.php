<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PricingSettingsBenefit
 * @package App
 */
class PricingSettingsBenefit extends Model
{
    protected $fillable = [
        'description', 'price_settings_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pricingPlan()
    {
        return $this->belongsTo(PriceSettings::class);
    }
}
