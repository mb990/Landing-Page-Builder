<?php

namespace App;

use Cesargb\Database\Support\CascadeDelete;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TopMenuSettings
 * @package App
 */
class TopMenuSettings extends Model
{
    use CascadeDelete;

    protected $with = ['links', 'image'];

    protected $cascadeDeleteMorph = ['pageElement', 'image'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function pageElement()
    {
        return $this->morphOne(PageElement::class, 'page_elementable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function links()
    {
        return $this->hasMany(TopMenuLink::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
