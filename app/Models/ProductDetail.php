<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'description', 'meta_title', 'meta_description',
        'is_variant', 'variations', 'colors'
    ];

    protected $casts = [
        'is_variant' => 'boolean',
        'variations' => 'array', 
        'colors' => 'array'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
