<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AwesomeIcon extends Model
{
    protected $fillable = [
        'name'
    ];

    public function tiles()
    {
        return $this->hasMany(GeneralContentThreeTile::class);
    }
}
