<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageElement extends Model
{
    protected $fillable = [
        'name', 'page_element_type_id'
    ];

    public function pageElement()
    {
        return $this->morphTo();
    }

    public function pageElementType()
    {
        return $this->belongsTo(PageElement::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}
