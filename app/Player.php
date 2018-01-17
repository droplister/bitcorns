<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address', 'name', 'description', 'location', 'image_url',
    ];

    /**
     * These attributes are dynamically added.
     *
     * @var array
     */
    protected $appends = [
        'has_access', 'has_points',
    ];

    /**
     * Has Acccess Tokens
     *
     * @var string
     */
    public function getHasAccessAttribute()
    {
        return $this->balances()->whereHas('token', function($q){
            $q->where('type', '=', 'access');
        })->count();
    }

    /**
     * Has Point Tokens
     *
     * @var string
     */
    public function getHasPointsAttribute()
    {
        return $this->balances()->whereHas('token', function($q){
            $q->where('type', '=', 'points');
        })->count();
    }

    /**
     * Player Balances
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function balances()
    {
        return $this->hasMany(Balance::class)->with('token');
    }

    /**
     * Player Rewards
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function rewards()
    {
        return $this->belongsToMany(Reward::class, 'player_reward')->withPivot('quantity_rewarded');
    }
}