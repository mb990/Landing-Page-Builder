<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralContentThreeSettings extends Model
{
    protected $fillable = [
        'title', 'text', 'link_url', 'button_value'
    ];

    protected $with = ['bulletPoints'];

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
