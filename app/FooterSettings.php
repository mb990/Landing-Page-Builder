<?php

namespace App;

use Cesargb\Database\Support\CascadeDelete;
use Illuminate\Database\Eloquent\Model;

class FooterSettings extends Model
{
    use CascadeDelete;

    protected $fillable = [
        'creator', 'year_made', 'facebook_url', 'instagram_url', 'twitter_url'
    ];

    protected $cascadeDeleteMorph = ['pageElement'];

    public function pageElement()
    {
        return $this->morphOne(PageElement::class, 'page_elementable');
    }
}
