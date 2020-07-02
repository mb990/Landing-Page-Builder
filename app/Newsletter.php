<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $fillable = [
        'subject', 'main_text', 'project_id'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
