<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'type', 'amount', 'confirmed', 'meta', 'reference'
    ];

    protected $casts = [
        'confirmed' => 'bool',
        'meta' => 'json',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

        /**
     * Scope a query to only include transactions made last month.
     */
    public function scopeLastMonth(Builder $query): Builder
    {
        return $query->whereBetween('created_at', [carbon('1 month ago'), now()])
            ->latest();
    }
}
