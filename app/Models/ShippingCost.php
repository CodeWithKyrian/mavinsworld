<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingCost extends Model
{
    use HasFactory;

    protected $fillable = ['group_name', 'pickup_amount', 'delivery_amount'];

    public $timestamps = false;

    public function states()
    {
        return $this->hasMany(State::class);
    }
}
