<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'name', 'description', 'source', 'issuer', 'quantity', 'divisible', 'locked',
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
        return $this->divisible ? number_format($this->quantity / 100000000, 8) : $this->quantity;
    }
}
