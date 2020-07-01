<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralContentSettings extends Model
{
    protected $fillable = [
        'main_text'
    ];

    public function pageElement()
    {
        return $this->morphOne(PageElement::class, 'page_elementable');
    }
}
