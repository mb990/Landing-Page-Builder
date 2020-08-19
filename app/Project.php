<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Project
 * @package App
 */
class Project extends Model
{
    use Sluggable;

    protected $fillable = [
        'user_id', 'template_id', 'name', 'slug'
    ];

    protected $with = ['pageElements', 'subscribers'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pageElements()
    {
        return $this->hasMany(PageElement::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscribers()
    {
        return $this->hasMany(Subscriber::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getSections()
    {
        return $this->pageElements()
            ->with('pageElementable')
            ->oldest()
            ->get();
    }

    /**
     * @return Model|\Illuminate\Database\Eloquent\Relations\HasMany|object|null
     */
    public function getElementWithHighestOrder()
    {
        return $this->pageElements()
            ->orderBy('render_order', 'desc')
            ->first();
    }

    /**
     * @return \string[][]
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
