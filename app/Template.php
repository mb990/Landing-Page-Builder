<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
