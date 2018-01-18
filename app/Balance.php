<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'player_id', 'token_id', 'token_type', 'token_name', 'quantity',
    ];

    /**
     * These attributes are dynamically added.
     *
     * @var array
     */
    protected $appends = [
        'quantity_normalized',
    ];

    /**
     * Normalized Quantity
     *
     * @var string
     */
    public function getQuantityNormalizedAttribute()
    {
        return $this->token->divisible ? number_format($this->quantity / 100000000, 8) : $this->quantity;
    }

    /**
     * Balance Player
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    /**
     * Balance Token
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function token()
    {
        return $this->belongsTo(Token::class);
    }
}
