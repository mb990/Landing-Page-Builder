<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Class Template
 * @package App
 */
class Template extends Model
{
    use Sluggable;

    protected $fillable = [
        'name', 'slug'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pageElements()
    {
        return $this->hasMany(PageElement::class);
    }

    /**
     * @param $sectionModel
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getSection($sectionModel)
    {
        return $this->pageElements()
            ->where('page_elementable_type', $sectionModel)
            ->with('pageElementable')
            ->get();
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
