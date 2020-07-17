<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralContentThreeTile extends Model
{
    protected $fillable = [
        'title', 'text', 'general_content_three_settings_id', 'blade_file', 'awesome_icon_id'
    ];

    protected $with = ['awesomeIcons'];

    public function generalContentSection()
    {
        return $this->belongsTo(GeneralContentThreeSettings::class);
    }

    public function awesomeIcon()
    {
        return $this->belongsTo(AwesomeIcon::class);
    }
}
