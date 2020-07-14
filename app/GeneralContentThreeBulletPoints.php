<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralContentThreeBulletPoints extends Model
{
    protected $fillable = [
        'title', 'text'
    ];

    public function generalContentSection()
    {
        return $this->belongsTo(GeneralContentThreeSettings::class);
    }
}
