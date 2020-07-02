<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'user_id', 'template_id', 'name'
    ];

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pageElements()
    {
        return $this->belongsToMany(PageElement::class, 'page_element_project');
    }

    public function newsletters()
    {
        return $this->hasMany(Newsletter::class);
    }

    public function subscribers()
    {
        return $this->hasMany(Subscriber::class);
    }
}
