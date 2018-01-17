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
        'player_id', 'token_id', 'quantity',
    ];

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
