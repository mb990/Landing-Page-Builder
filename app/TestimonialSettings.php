<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestimonialSettings extends Model
{
    protected $fillable = [
        'title', 'text', 'customer_name', 'testimonial_section_id', 'blade_file'
    ];

    protected $with = ['image'];

    public function testimonialSection()
    {
        return $this->belongsTo(TestimonialSection::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
