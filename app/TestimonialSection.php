<?php

namespace App;

use Cesargb\Database\Support\CascadeDelete;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TestimonialSection
 * @package App
 */
class TestimonialSection extends Model
{
    use CascadeDelete;

    protected $with = ['singleItems'];

    protected $cascadeDeleteMorph = ['pageElement'];

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
        return $this->hasMany(TestimonialSettings::class);
    }
}
