<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

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
            $this->paid_at => 'Awaiting Payment',
            $this->dispatched_at => 'Payment done',
            $this->delivered_at => 'Order Dispatched',
            default => 'Delivered'
        };
    }

    public function getStatusColorAttribute()
    {
        return match (null) {
            $this->paid_at => 'alert-danger',
            $this->dispatched_at => 'alert-warning',
            $this->delivered_at => 'alert-info',
            default => 'alert-success'
        };
    }
    public function getStatusLevelAttribute()
    {
        return match (null) {
            $this->paid_at => 0,
            $this->dispatched_at => 1,
            $this->delivered_at => 2,
            default => 3
        };
    }
}
