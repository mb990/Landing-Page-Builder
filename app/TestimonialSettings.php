<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestimonialSettings extends Model
{
    public function pageElement()
    {
        return $this->morphOne(PageElement::class, 'page_elementable');
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }
}
