<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestimonialSettings extends Model
{
    protected $fillable = [
        'text', 'customer_name'
    ];

    public function pageElement()
    {
        return $this->morphOne(PageElement::class, 'page_elementable');
    }
}
