<?php

namespace App;

use Cesargb\Database\Support\CascadeDelete;
use Illuminate\Database\Eloquent\Model;

class HeroSectionSettings extends Model
{
    use CascadeDelete;

    protected $fillable = [
        'title', 'subtitle', 'button_value'
    ];

    protected $with = ['image'];

    protected $cascadeDeleteMorph = ['pageElement', 'image'];

    public function pageElement()
    {
        return $this->morphOne(PageElement::class, 'page_elementable');
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
