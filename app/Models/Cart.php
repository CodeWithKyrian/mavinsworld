<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;

class Cart extends Model
{
    use HasFactory, Prunable;

    protected $fillable = [
        'user_id', 'temp_user_id', 'checked_out'
    ];

    protected $casts = [
        'checked_out' => 'boolean'
    ];

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTotalAttribute()
    {
        $total = 0;

        foreach ($this->items as $item) {
            $itemPrice = $item->quantity * get_sell_price($item->product, false);
            $total += $itemPrice;
        }

        return $total;
    }

    public function getItemCountAttribute()
    {
        $cartCount = 0;
        foreach ($this->items as $item) {
            $cartCount += $item->quantity;
        }
        return $cartCount;
    }

    /**
     * Get the prunable model query.
     */
    public function prunable(): Builder
    {
        return static::where('user_id', null)
            ->where('created_at', '<=', now()->subDays(2));
    }
}
