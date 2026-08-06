<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

/**
 * Dev/staging helper only. Marks a handful of existing ERP
 * inventory_items as publicly visible with a category, so the
 * portal has something to display before staff assign these
 * fields properly from the ERP side.
 *
 * Requires the `slug`, `category`, `image_path`, `is_public_visible`
 * columns on `inventory_items` and the `enquiries` table to already
 * exist — those migrations now live in the ERP app's own repo, not
 * here. Run them there first.
 *
 * Safe to skip in production — this only UPDATEs rows that already
 * exist; it never inserts fake inventory.
 */
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $sampleCategories = ['spices', 'baked-goods', 'beverages'];

        Product::query()
            ->whereNull('category')
            ->get()
            ->each(function (Product $product, int $i) use ($sampleCategories) {
                $product->forceFill([
                    'category' => $sampleCategories[$i % count($sampleCategories)],
                    'is_public_visible' => true,
                    'slug' => $product->slug ?: Str::slug($product->name).'-'.Str::random(4),
                ])->save();
            });
    }
}
