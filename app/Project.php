<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use Sluggable;

    protected $fillable = [
        'user_id', 'template_id', 'name', 'slug'
    ];

    protected $with = ['pageElements', 'subscribers'];

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
        return $this->hasMany(PageElement::class);
    }

    public function subscribers()
    {
        return $this->hasMany(Subscriber::class);
    }

    public function getSections()
    {
        return $this->pageElements()
            ->with('pageElementable')
            ->oldest()
            ->get();
    }

    public function getElementWithHighestOrder()
    {
        return $this->pageElements()
            ->orderBy('render_order', 'desc')
            ->first();
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
