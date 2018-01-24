<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tx_index', 'address', 'type', 'name', 'description', 'location', 'image_url', 'crops_owned', 'bitcorn_owned', 'bitcorn_harvests', 'bitcorn_harvested', 'created_at',
    ];

    /**
     * These attributes are dynamically added.
     *
     * @var array
     */
    protected $appends = [
        'display_image_url',
        'has_crops', 'crops_owned_normalized',
        'has_bitcorn', 'has_harvested', 
    ];

    /**
     * Set the farm name.
     *
     * @param  string  $value
     * @return void
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = "{$value} Farm";
    }

    /**
     * Display Image URL
     *
     * @var string
     */
    public function getDisplayImageUrlAttribute()
    {
        return $this->crops_owned > 0 ? $this->image_url : 'http://bitcorns.com/img/farm-0.jpg';
    }

    /**
     * Has Crops
     *
     * @var string
     */
    public function getHasCropsAttribute()
    {
        return $this->crops_owned > 0;
    }

    /**
     * Crops Normalized
     *
     * @var string
     */
    public function getCropsOwnedNormalizedAttribute()
    {
        return number_format($this->crops_owned / 100000000, 8);
    }

    /**
     * Has Bitcorn
     *
     * @var string
     */
    public function getHasBitcornAttribute()
    {
        return $this->bitcorn_owned > 0;
    }

    /**
     * Has Harvested
     *
     * @var string
     */
    public function getHasHarvestedAttribute()
    {
        return $this->bitcorn_harvested > 0;
    }

    /**
     * Farmer Harvest History
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function harvests()
    {
        return $this->belongsToMany(Harvest::class, 'farm_harvest')->withPivot('bitcorn');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'address';
    }
}