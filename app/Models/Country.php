<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $fillable = [
        'code', 'name', 'status'
    ];

    public $timestamps = false;

    protected $casts = [
        'status' => 'bool'
    ];

    public function states()
    {
        return $this->hasMany(State::class);
    }
}
