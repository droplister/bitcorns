<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Harvest extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bitcorn_total', 'bitcorn_per_crops', 'block_index',
    ];

    /**
     * Harvest Farmers
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function farmers()
    {
        return $this->belongsToMany(Farm::class, 'farm_harvest')->withPivot('bitcorn');
    }
}
