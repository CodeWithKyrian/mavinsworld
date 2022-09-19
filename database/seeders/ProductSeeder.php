<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Discount;
use App\Models\Product;
use App\Models\ProductDiscount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::factory()->count(2)->create();
        // $categories->push(Category::create([
        //     'name' => 'Sexual Enhancement',
        //     'slug' => 'sexual-enhancement',
        //     'tags' => ['secual'],
        //     'description' => 'Some description'
        // ]));
        $products = [
            [
                'name' => 'Boob Enlargement', 'slug' => 'boob-enlargement', 'sku' => Str::random(8), 'tags' => ['sperm', 'booster'], 'cost_price' => 20000, 'selling_price' => 10000, 'current_stock' => 10, 'total_stock' => 50, 'unit' => 'bottles', 'is_published' => true, 'rating' => 3.5, 'url' => asset('img/product/boob-enlargement.jpg'), 'is_featured' => true
            ],
            [
                'name' => 'Butt Enlargement', 'slug' => 'butt-enlargement', 'sku' => Str::random(8), 'tags' => ['sperm', 'booster'], 'cost_price' => 23000, 'selling_price' => 12000, 'current_stock' => 10, 'total_stock' => 50, 'unit' => 'bottles', 'is_published' => true, 'rating' => 3.5, 'url' => asset('img/product/butt-enlargement.jpg')
            ],
            [
                'name' => 'Dick Enlargement', 'slug' => 'dick-enlargement', 'sku' => Str::random(8), 'tags' => ['dick', 'enlargement'], 'cost_price' => 20000, 'selling_price' => 15000, 'current_stock' => 10, 'total_stock' => 50, 'unit' => 'bottles', 'is_published' => true, 'rating' => 4.5, 'url' => asset('img/product/dick-enlargement.jpg')
            ],
            [
                'name' => 'Dick Enlargement Full Dosage', 'slug' => 'dick-enlargement-full', 'sku' => Str::random(8), 'tags' => ['dick', 'enlargement'], 'cost_price' => 20000, 'selling_price' => 15000, 'current_stock' => 10, 'total_stock' => 50, 'unit' => 'bottles', 'is_published' => true, 'rating' => 4.5, 'url' => asset('img/product/dick-enlargement2.jpg')
            ],
            [
                'name' => 'Fat Burner', 'slug' => 'fat-burner', 'sku' => Str::random(8), 'tags' => ['sperm', 'booster'], 'cost_price' => 13000, 'selling_price' => 9000, 'current_stock' => 10, 'total_stock' => 50, 'unit' => 'bottles', 'is_published' => true, 'rating' => 3.5, 'url' => asset('img/product/fat-burner.jpg'), 'is_featured' => true
            ],
            [
                'name' => 'Female Correction Kit', 'slug' => 'female-correction-kit', 'sku' => Str::random(8), 'tags' => ['sperm', 'booster'], 'cost_price' => 35000, 'selling_price' => 22000, 'current_stock' => 10, 'total_stock' => 50, 'unit' => 'bottles', 'is_published' => true, 'rating' => 3.5, 'url' => asset('img/product/female-correction-kit.jpg')
            ],
            [
                'name' => 'Immune Booster', 'slug' => 'immune-booster', 'sku' => Str::random(8), 'tags' => ['sperm', 'booster'], 'cost_price' => 27000, 'selling_price' => 24000, 'current_stock' => 10, 'total_stock' => 50, 'unit' => 'bottles', 'is_published' => true, 'rating' => 3.5, 'url' => asset('img/product/immune-booster.jpg'), 'is_featured' => true
            ],
            [
                'name' => 'Infection Cleanser', 'slug' => 'infection-cleanser', 'sku' => Str::random(8), 'tags' => ['infection', 'cleanser'], 'cost_price' => 15000, 'selling_price' => 12000, 'current_stock' => 10, 'total_stock' => 50, 'unit' => 'bottles', 'is_published' => true, 'rating' => 4.2, 'url' => asset('img/product/infection-cleanser.jpg')
            ],
            [
                'name' => 'Infection Cleanser Full Dosage', 'slug' => 'infection-cleanser-full', 'sku' => Str::random(8), 'tags' => ['infection', 'cleanser'], 'cost_price' => 25000, 'selling_price' => 24000, 'current_stock' => 10, 'total_stock' => 50, 'unit' => 'bottles', 'is_published' => true, 'rating' => 4.2, 'url' => asset('img/product/infection-cleanser-full.jpg')
            ],
            [
                'name' => 'Man Power Kit', 'slug' => 'man-power-kit', 'sku' => Str::random(8), 'tags' => ['man', 'power'], 'cost_price' => 18000, 'selling_price' => 15000, 'current_stock' => 10, 'total_stock' => 50, 'unit' => 'bottles', 'is_published' => true, 'rating' => 4.7, 'url' => asset('img/product/man-power.jpg'), 'is_featured' => true
            ],
            [
                'name' => 'Man Power Special', 'slug' => 'man-power-special', 'sku' => Str::random(8), 'tags' => ['man', 'power'], 'cost_price' => 38000, 'selling_price' => 35000, 'current_stock' => 10, 'total_stock' => 50, 'unit' => 'bottles', 'is_published' => true, 'rating' => 4.7, 'url' => asset('img/product/man-power-special.jpg')
            ],
            [
                'name' => 'Men Booster', 'slug' => 'men-booster', 'sku' => Str::random(8), 'tags' => ['man', 'power'], 'cost_price' => 17500, 'selling_price' => 15000, 'current_stock' => 10, 'total_stock' => 50, 'unit' => 'bottles', 'is_published' => true, 'rating' => 4.7, 'url' => asset('img/product/men-booster.jpg')
            ],
            [
                'name' => 'Ovulation Booster', 'slug' => 'ovulation-booster', 'sku' => Str::random(8), 'tags' => ['man', 'power'], 'cost_price' => 27500, 'selling_price' => 25000, 'current_stock' => 10, 'total_stock' => 50, 'unit' => 'bottles', 'is_published' => true, 'rating' => 4.7, 'url' => asset('img/product/ovulation-booster.jpg')
            ],
            [
                'name' => 'Pile Treatment', 'slug' => 'pile-treatment', 'sku' => Str::random(8), 'tags' => ['man', 'power'], 'cost_price' => 17500, 'selling_price' => 12000, 'current_stock' => 10, 'total_stock' => 50, 'unit' => 'bottles', 'is_published' => true, 'rating' => 4.7, 'url' => asset('img/product/pile-treatment.jpg'), 'is_featured' => true
            ],
            [
                'name' => 'Poor Erection Cure', 'slug' => 'poor-erection-cure', 'sku' => Str::random(8), 'tags' => ['man', 'power'], 'cost_price' => 37500, 'selling_price' => 30000, 'current_stock' => 10, 'total_stock' => 50, 'unit' => 'bottles', 'is_published' => true, 'rating' => 4.7, 'url' => asset('img/product/poor-erection-cure.jpg'), 'is_featured' => true
            ],
            [
                'name' => 'Prostrate Cure', 'slug' => 'prostrate-cure', 'sku' => Str::random(8), 'tags' => ['man', 'power'], 'cost_price' => 17500, 'selling_price' => 15000, 'current_stock' => 10, 'total_stock' => 50, 'unit' => 'bottles', 'is_published' => true, 'rating' => 4.7, 'url' => asset('img/product/prostrate-cure.jpg')
            ],
            [
                'name' => 'Pussy Drip', 'slug' => 'pussy-drip', 'sku' => Str::random(8), 'tags' => ['pussy', 'tightner'], 'cost_price' => 5000, 'selling_price' => 4500, 'current_stock' => 10, 'total_stock' => 50, 'unit' => 'bottles', 'is_published' => true, 'rating' => 4.6, 'url' => asset('img/product/pussy-drip.jpg'), 'is_featured' => true
            ],

            [
                'name' => 'Quick Ejaculation Cure', 'slug' => 'quick-ejaculation-cure', 'sku' => Str::random(8), 'tags' => ['quick', 'ejaculation'], 'cost_price' => 34000, 'selling_price' => 30000, 'current_stock' => 10, 'total_stock' => 50, 'unit' => 'bottles', 'is_published' => true, 'rating' => 4.0, 'url' => asset('img/product/quick-ejaculation-cure.jpg')
            ],
            [
                'name' => 'Sperm Booster', 'slug' => 'sperm-booster', 'sku' => Str::random(8), 'tags' => ['pussy', 'sweetner'], 'cost_price' => 12500, 'selling_price' => 10000, 'current_stock' => 10, 'total_stock' => 50, 'unit' => 'bottles', 'is_published' => true, 'rating' => 4.7, 'url' => asset('img/product/sperm-booster.jpg'), 'is_featured' => true
            ],
            [
                'name' => 'Stretch Mark Cream', 'slug' => 'stretch-mark-cream', 'sku' => Str::random(8), 'tags' => ['goodluck', 'kit'], 'cost_price' => 34000, 'selling_price' => 30000, 'current_stock' => 10, 'total_stock' => 50, 'unit' => 'bottles', 'is_published' => true, 'rating' => 4.0, 'url' => asset('img/product/stretch-mark-cream.jpg')
            ],
            [
                'name' => 'Sugar Flusher', 'slug' => 'sugar-flusher', 'sku' => Str::random(8), 'tags' => ['sugar', 'flusher'], 'cost_price' => 18000, 'selling_price' => 16500, 'current_stock' => 10, 'total_stock' => 50, 'unit' => 'bottles', 'is_published' => true, 'rating' => 4.3, 'url' => asset('img/product/sugar-flusher.jpg'), 'is_featured' => true
            ],
            [
                'name' => 'Typhoid and Malaria Kit', 'slug' => 'typhoid-nd-malaria', 'sku' => Str::random(8), 'tags' => ['prostrate', 'kit'], 'cost_price' => 10000, 'selling_price' => 8500, 'current_stock' => 10, 'total_stock' => 50, 'unit' => 'bottles', 'is_published' => true, 'rating' => 4.3, 'url' => asset('img/product/typhoid-nd-malaria.jpg')
            ],
            [
                'name' => 'Ulcer Cure', 'slug' => 'ulcer-cure', 'sku' => Str::random(8), 'tags' => ['prostrate', 'kit'], 'cost_price' => 10000, 'selling_price' => 8500, 'current_stock' => 10, 'total_stock' => 50, 'unit' => 'bottles', 'is_published' => true, 'rating' => 4.3, 'url' => asset('img/product/ulcer-cure.jpg'), 'is_featured' => true
            ],
            [
                'name' => 'Women Fertility Kit', 'slug' => 'women-fertility-kit', 'sku' => Str::random(8), 'tags' => ['prostrate', 'kit'], 'cost_price' => 10000, 'selling_price' => 8500, 'current_stock' => 10, 'total_stock' => 50, 'unit' => 'bottles', 'is_published' => true, 'rating' => 4.3, 'url' => asset('img/product/women-fertility-kit.jpg')
            ],

        ];

        foreach ($products as $prod) {
            $url = $prod['url'];
            unset($prod['url']);
            $product = $categories->random()->products()->create($prod);
            $product->addMediaFromUrl($url)->toMediaCollection('thumbnail');
        }

        Discount::factory()->count(10)->create();
    }
}
