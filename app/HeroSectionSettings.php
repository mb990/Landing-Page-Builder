<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeroSectionSettings extends Model
{
    protected $fillable = [
        'title', 'subtitle', 'button_value'
    ];

    public function pageElement()
    {
        return $this->morphOne(PageElement::class, 'page_elementable');
    }
}
