<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestimonialSettings extends Model
{
    protected $fillable = [
        'text', 'customer_name', 'testimonial_section_id'
    ];

    public function testimonialSection()
    {
        return $this->belongsTo(TestimonialSection::class);
    }

//    public function pageElement()
//    {
//        return $this->morphOne(PageElement::class, 'page_elementable');
//    }
}
