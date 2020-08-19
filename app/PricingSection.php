<?php

namespace App;

use Cesargb\Database\Support\CascadeDelete;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PricingSection
 * @package App
 */
class PricingSection extends Model
{
    use CascadeDelete;

    protected $cascadeDeleteMorph = ['pageElement'];

    protected $with = ['singleItems'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function pageElement()
    {
        return $this->morphOne(PageElement::class, 'page_elementable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function singleItems()
    {
        return $this->hasMany(PriceSettings::class);
    }
}
