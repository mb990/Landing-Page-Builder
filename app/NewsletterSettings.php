<?php

namespace App;

use Cesargb\Database\Support\CascadeDelete;
use Illuminate\Database\Eloquent\Model;

/**
 * Class NewsletterSettings
 * @package App
 */
class NewsletterSettings extends Model
{
    use CascadeDelete;

    protected $fillable = [
        'title', 'button_value'
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
