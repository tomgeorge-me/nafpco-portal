<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Read-facing model over the ERP's `inventory_items` table.
 *
 * IMPORTANT: this table also holds internal ERP data (cost_price,
 * quantity, reorder_level, gst_rate, sku/barcode/item_code) that must
 * never be exposed publicly. Every column NOT explicitly listed in
 * $fillable/$visible below is hidden by default via $hidden, and every
 * public query MUST go through the `public()` scope so items the ERP
 * hasn't marked `is_public_visible` never leak onto the site.
 */
class Product extends Model
{
    protected $table = 'inventory_items';

    // This app never writes to the ERP catalog itself.
    public $timestamps = true;

    protected $guarded = [];

    /**
     * Columns that are safe to ever serialize or display publicly.
     * Everything else (cost_price, quantity, reorder_level, gst_rate,
     * sku, item_code, barcode) stays hidden even if a future query
     * forgets to select() explicitly.
     */
    protected $visible = [
        'id',
        'slug',
        'name',
        'description',
        'unit',
        'category',
        'image_path',
    ];

    /**
     * Only items the ERP has explicitly flagged for the public site.
     */
    public function scopePublicVisible(Builder $query): Builder
    {
        return $query->where('is_public_visible', true);
    }

    public function scopeCategory(Builder $query, ?string $category): Builder
    {
        if (! $category || $category === 'all') {
            return $query;
        }

        return $query->where('category', $category);
    }

    public function getImageUrlAttribute(): string
    {
        return $this->image_path
            ? asset('storage/'.ltrim($this->image_path, '/'))
            : asset('images/product-placeholder.svg');
    }

    public function getCategoryLabelAttribute(): string
    {
        return config('company.product_categories.'.$this->category, Str::headline((string) $this->category));
    }

    protected static function booted(): void
    {
        static::creating(function (Product $product) {
            if (empty($product->slug) && ! empty($product->name)) {
                $product->slug = Str::slug($product->name).'-'.Str::random(4);
            }
        });
    }
}
