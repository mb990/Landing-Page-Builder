<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralContentBulletPoint extends Model
{
    protected $fillable = [
        'text', 'general_content_settings_id'
    ];

    public function generalContentSection()
    {
        return $this->belongsTo(GeneralContentSettings::class);
    }
}
