<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const STATUS_UNPAID = 'Awaiting Payment';
    const STATUS_PAID = 'Payment done';
    const STATUS_DISPATCHED = 'Order Dispatched';
    const STATUS_DELIVERED = 'Delivered';

    protected $fillable = [
        'code', 'user_id', 'address_id', 'sub_total', 'shipping_fee', 'grand_total', 'shipping_method', 'paid_at', 'dispatched_at',
        'ordered_at', 'delivered_at'
    ];

    protected $casts = [
        'paid_at' => 'datetime',
        'ordered_at' => 'datetime',
        'delivered_at' => 'datetime',
        'dispatched_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }

    public function getRouteKeyName(): string
    {
        if (request()->expectsJson()) {
            return 'id';
        }

        return 'code';
    }

    public function getStatusAttribute()
    {
        return match (null) {
            $this->paid_at => self::STATUS_UNPAID,
            $this->dispatched_at => self::STATUS_PAID,
            $this->delivered_at => self::STATUS_DISPATCHED,
            default => self::STATUS_DELIVERED
        };
    }

    public function getStatusColorAttribute()
    {
        return match ($this->status) {
            self::STATUS_UNPAID => 'alert-danger',
            self::STATUS_PAID => 'alert-warning',
            self::STATUS_DISPATCHED => 'alert-info',
            default => 'alert-success'
        };
    }
    public function getStatusLevelAttribute()
    {
        return match ($this->status) {
            self::STATUS_UNPAID => 0,
            self::STATUS_PAID => 1,
            self::STATUS_DISPATCHED => 2,
            default => 3
        };
    }

        /**
     * Scope a query to search posts
     */
    public function scopeSearch(Builder $query, ?string $search)
    {
        if ($search) {
            return $query
            ->where('code', 'LIKE', "%{$search}%")
            ->orWhereRelation('user', 'firstname', 'LIKE', "%{$search}%")
            ->orWhereRelation('user', 'lastname', 'LIKE', "%{$search}%")
            ->latest();
        }
    }

    public function getItemCountAttribute()
    {
        $cartCount = 0;
        foreach ($this->items as $item) {
            $cartCount += $item->quantity;
        }
        return $cartCount;
    }
}
