<?php

namespace App;

use Cesargb\Database\Support\CascadeDelete;
use Illuminate\Database\Eloquent\Model;

class GeneralContentThreeSettings extends Model
{
    use CascadeDelete;

    protected $fillable = [
        'title', 'text', 'link_url', 'button_value'
    ];

    protected $with = ['bulletPoints', 'tiles'];

    protected $cascadeDeleteMorph = ['pageElement'];

    public function pageElement()
    {
        return $this->morphOne(PageElement::class, 'page_elementable');
    }

    public function bulletPoints()
    {
        return $this->hasMany(GeneralContentThreeBulletPoint::class);
    }

    public function tiles()
    {
        return $this->hasMany(GeneralContentThreeTile::class);
    }
}
