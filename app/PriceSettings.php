<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PriceSettings
 * @package App
 */
class PriceSettings extends Model
{
    protected $fillable = [
        'name', 'yearly_price', 'monthly_price', 'discount_amount', 'blade_file', 'pricing_section_id'
    ];

    protected $with = ['benefits'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pricingSection()
    {
        return $this->belongsTo(PricingSection::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function benefits()
    {
        return $this->hasMany(PricingSettingsBenefit::class);
    }
}
