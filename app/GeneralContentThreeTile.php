<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralContentThreeTile extends Model
{
    protected $fillable = [
        'title', 'text', 'general_content_three_settings_id'
    ];

    public function generalContentSection()
    {
        return $this->belongsTo(GeneralContentThreeSettings::class);
    }
}
