<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Subscriber extends Model
{
    use Notifiable;

    protected $fillable = [
        'email', 'name', 'project_id'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
