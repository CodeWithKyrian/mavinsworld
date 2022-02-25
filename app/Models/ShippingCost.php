<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingCost extends Model
{
    use HasFactory;

    protected $fillable = ['amount'];

    public $timestamps = false;

    public function states()
    {
        return $this->belongsToMany(State::class)->withPivot(['type']);
    }
}
