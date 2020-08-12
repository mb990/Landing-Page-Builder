<?php

namespace App;

use Cesargb\Database\Support\CascadeDelete;
use Illuminate\Database\Eloquent\Model;

class PageElement extends Model
{
    use CascadeDelete;

    protected $fillable = [
        'page_element_type_id', 'page_elementable_id', 'page_elementable_type', 'project_id', 'template_id', 'blade_file, render_order'
    ];

    protected $cascadeDeleteMorph = ['pageElementable'];

    protected $with = ['pageElementable'];

    public function pageElementable()
    {
        return $this->morphTo();
    }

    public function pageElementType()
    {
        return $this->belongsTo(PageElementType::class);
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
