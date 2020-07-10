<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestimonialSettings extends Model
{
    protected $fillable = [
        'title', 'text', 'customer_name', 'testimonial_section_id', 'blade_file'
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
