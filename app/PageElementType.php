<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageElementType extends Model
{
    protected $fillable = [
        'name'
    ];

    public function pageElements()
    {
        return $this->hasMany(PageElement::class);
    }
}
