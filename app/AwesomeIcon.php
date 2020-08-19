<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AwesomeIcon
 * @package App
 */
class AwesomeIcon extends Model
{
    protected $fillable = [
        'name'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tiles()
    {
        return $this->hasMany(GeneralContentThreeTile::class);
    }
}
