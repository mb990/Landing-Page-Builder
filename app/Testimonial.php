<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'text', 'customer_name', 'testimonial_settings_id'
    ];

    public function testimonialSection()
    {
        return $this->belongsTo(TestimonialSettings::class);
    }
}
