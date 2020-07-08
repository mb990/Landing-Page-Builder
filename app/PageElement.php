<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageElement extends Model
{
    protected $fillable = [
        'page_element_type_id', 'page_elementable_id', 'page_elementable_type', 'project_id', 'template_id', 'blade_file'
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
