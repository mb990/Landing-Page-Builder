<?php

namespace App;

use Cesargb\Database\Support\CascadeDelete;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TestimonialSettings
 * @package App
 */
class TestimonialSettings extends Model
{
    use CascadeDelete;

    protected $fillable = [
        'title', 'text', 'customer_name', 'testimonial_section_id', 'blade_file'
    ];

    protected $with = ['image'];

    protected $cascadeDeleteMorph = ['pageElement'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function testimonialSection()
    {
        return $this->belongsTo(TestimonialSection::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
