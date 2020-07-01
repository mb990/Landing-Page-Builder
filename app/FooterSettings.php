<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FooterSettings extends Model
{
    protected $fillable = [
        'text', 'year', 'facebook_link', 'instagram_link', 'tweeter_link'
    ];

    public function pageElement()
    {
        return $this->morphOne(PageElement::class, 'page_elementable');
    }
}
