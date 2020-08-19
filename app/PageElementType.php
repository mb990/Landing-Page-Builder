<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PageElementType
 * @package App
 */
class PageElementType extends Model
{
    protected $fillable = [
        'name'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pageElements()
    {
        return $this->hasMany(PageElement::class);
    }
}
