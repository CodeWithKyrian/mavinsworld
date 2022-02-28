<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ['name', 'country_id', 'status', 'shipping_cost_id'];
    public $timestamps = false;

    protected $casts = [
        'status' => 'bool'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    
    public function shipping_cost()
    {
        return $this->belongsTo(ShippingCost::class);
    }
}
