<?php

namespace App;

use Cesargb\Database\Support\CascadeDelete;
use Illuminate\Database\Eloquent\Model;

class TestimonialSettings extends Model
{
    use CascadeDelete;

    protected $fillable = [
        'title', 'text', 'customer_name', 'testimonial_section_id', 'blade_file'
    ];

    protected $with = ['image'];

    protected $cascadeDeleteMorph = ['pageElement'];

    public function testimonialSection()
    {
        return $this->belongsTo(TestimonialSection::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
