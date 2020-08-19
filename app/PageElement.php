<?php

namespace App;

use Cesargb\Database\Support\CascadeDelete;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PageElement
 * @package App
 */
class PageElement extends Model
{
    use CascadeDelete;

    protected $fillable = [
        'page_element_type_id', 'page_elementable_id', 'page_elementable_type', 'project_id', 'template_id', 'blade_file', 'render_order'
    ];

    protected $cascadeDeleteMorph = ['pageElementable'];

    protected $with = ['pageElementable'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function pageElementable()
    {
        return $this->morphTo();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pageElementType()
    {
        return $this->belongsTo(PageElementType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}
