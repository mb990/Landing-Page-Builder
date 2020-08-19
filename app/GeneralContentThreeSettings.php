<?php

namespace App;

use Cesargb\Database\Support\CascadeDelete;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GeneralContentThreeSettings
 * @package App
 */
class GeneralContentThreeSettings extends Model
{
    use CascadeDelete;

    protected $fillable = [
        'title', 'text', 'link_url', 'button_value'
    ];

    protected $with = ['bulletPoints', 'tiles'];

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
    public function bulletPoints()
    {
        return $this->hasMany(GeneralContentThreeBulletPoint::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tiles()
    {
        return $this->hasMany(GeneralContentThreeTile::class);
    }
}
