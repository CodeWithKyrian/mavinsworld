<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'name', 'slug', 'sku', 'category_id',
        'tags', 'cost_price', 'selling_price',
        'current_stock', 'total_stock', 'unit',
        'is_published', 'is_featured', 'is_popular', 'rating'
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
        'is_popular' => 'boolean',
        'tags' => 'array'
    ];

    public function details(): HasOne
    {
        return $this->hasOne(ProductDetail::class);
    }

    public function discount(): HasOne
    {
        return $this->hasOne(Discount::class)
            ->whereDate('started_at', '<=', now())
            ->whereDate('ended_at', '>', now())->latest();
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function hasDiscount(): bool
    {
        return $this->discount != null;
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getRouteKeyName(): string
    {
        if (request()->expectsJson()) {
            return 'id';
        }

        return 'slug';
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('thumbnail')
            ->singleFile()
            ->withResponsiveImages();
    }

    /**
     * Scope a query to only include featured products.
     */
    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true)
            ->where('is_published', true)
            ->latest();
    }

    /**
     * Scope a query to only include popular products.
     */
    public function scopePopular(Builder $query): Builder
    {
        return $query->where('is_popular', true)
            ->where('is_published', true)
            ->latest();
    }

    /**
     * Scope a query to only include published products.
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true)
            ->latest();
    }

    /**
     * Scope a query to search products
     */
    public function scopeSearch(Builder $query, ?string $search)
    {
        if ($search) {
            return $query
                ->where('name', 'LIKE', "%{$search}%")
                ->orWhereRelation('details', 'description', 'LIKE', "%{$search}%")
                ->orWhereRelation('category', 'name', 'LIKE', "%{$search}%")
                ->latest();
        }
    }
}
