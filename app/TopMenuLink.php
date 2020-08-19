<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TopMenuLink
 * @package App
 */
class TopMenuLink extends Model
{
    protected $fillable = [
        'url', 'title', 'top_menu_settings_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function topMenu()
    {
        return $this->belongsTo(TopMenuSettings::class);
    }
}
