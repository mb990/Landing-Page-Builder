<?php

namespace App;

use Cesargb\Database\Support\CascadeDelete;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GeneralContentOneSettings
 * @package App
 */
class GeneralContentOneSettings extends Model
{
    use CascadeDelete;

    protected $fillable = [
        'title', 'text', 'link_url', 'button_value'
    ];

    protected $with = ['image'];

    protected $cascadeDeleteMorph = ['pageElement', 'image'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function pageElement()
    {
        return $this->morphOne(PageElement::class, 'page_elementable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
