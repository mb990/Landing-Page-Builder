<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GeneralContentThreeTile
 * @package App
 */
class GeneralContentThreeTile extends Model
{
    protected $fillable = [
        'title', 'text', 'general_content_three_settings_id', 'blade_file', 'awesome_icon_id'
    ];

    protected $with = ['awesomeIcon'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function generalContentSection()
    {
        return $this->belongsTo(GeneralContentThreeSettings::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function awesomeIcon()
    {
        return $this->belongsTo(AwesomeIcon::class);
    }
}
