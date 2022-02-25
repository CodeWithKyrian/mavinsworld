<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'value', 'type', 'started_at', 'ended_at'
    ];


    protected $casts = [
        'started_at' => 'datetime',
        'ended_at'=> 'datetime'
    ];
}
