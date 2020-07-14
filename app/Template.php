<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Template extends Model
{
    protected $fillable = [
        'name'
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function pageElements()
    {
        return $this->hasMany(PageElement::class);
    }

    public function getSection($sectionModel)
    {
        return $this->pageElements()
            ->where('page_elementable_type', $sectionModel)
            ->with('pageElementable')
            ->get();
    }
}
