<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopMenuLink extends Model
{
    protected $fillable = [
        'url', 'title', 'top_menu_settings_id'
    ];

    public function topMenu()
    {
        return $this->belongsTo(TopMenuSettings::class);
    }
}
