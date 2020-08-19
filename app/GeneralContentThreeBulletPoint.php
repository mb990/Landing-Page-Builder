<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GeneralContentThreeBulletPoint
 * @package App
 */
class GeneralContentThreeBulletPoint extends Model
{
    protected $fillable = [
        'title', 'text', 'general_content_three_settings_id', 'blade_file'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function generalContentSection()
    {
        return $this->belongsTo(GeneralContentThreeSettings::class);
    }
}
