<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlashDeal extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['title', 'slug', 'status', 'started_at', 'ended_at'];

    protected $casts = [
        'status' => 'boolean',
        'started_at' => 'datetime',
        'ended_at' => 'datetime',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->as('details');
    }

    public function scopeCurrent(Builder $query)
    {
        return $query->where('status', 1)->whereTime('started_at', '<=', now())
            ->whereTime('ended_at', '>', now());
    }
}
