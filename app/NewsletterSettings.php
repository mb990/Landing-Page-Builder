<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsletterSettings extends Model
{
    protected $fillable = [
        'title', 'button_value'
    ];

    protected $with = ['image'];

    public function pageElement()
    {
        return $this->morphOne(PageElement::class, 'page_elementable');
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
