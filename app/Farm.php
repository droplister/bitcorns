<?php

namespace App;

use Blocktrail\SDK\BlocktrailSDK;

use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tx_index', 'address', 'type', 'name', 'description', 'location', 'image_url', 'crops_owned', 'bitcorn_owned', 'bitcorn_harvested', 'bitcorn_harvests', 'created_at',
    ];

    /**
     * These attributes are dynamically added.
     *
     * @var array
     */
    protected $appends = [
        'display_name', 'display_location', 'display_image_url',
        'has_crops', 'crops_owned_normalized',
        'has_bitcorn', 'has_harvested', 
    ];

    /**
     * Display Name
     *
     * @var string
     */
    public function getDisplayNameAttribute()
    {
        return $this->has_crops ? $this->name : 'NO CROPPER';
    }

    /**
     * Display Location
     *
     * @var string
     */
    public function getDisplayLocationAttribute()
    {
        return $this->has_crops ? $this->location : 'Szaboan Desert';
    }

    /**
     * Display Image URL
     *
     * @var string
     */
    public function getDisplayImageUrlAttribute()
    {
        return $this->has_crops ? asset($this->image_url) : asset('/img/farm-0.jpg');
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
        return BlocktrailSDK::toBTC($this->crops_owned);
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