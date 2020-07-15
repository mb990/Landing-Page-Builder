<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralContentThreeBulletPoint extends Model
{
    protected $fillable = [
        'title', 'text', 'general_content_three_settings_id', 'blade_file'
    ];

    public function generalContentSection()
    {
        return $this->belongsTo(GeneralContentThreeSettings::class);
    }
}
