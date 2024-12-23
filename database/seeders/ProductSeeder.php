<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    public const DEFAULT_CURRENCY = 'VNĐ';

    public $products = [
        [
            'category_id' => 1,
            'name' => 'Espresso',
            'description' => 'Espresso is a strong coffee brewed by forcing hot water through finely-ground coffee beans.',
            'price' => 30000,
            'display_image_url' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93',
        ],
        [
            'category_id' => 1,
            'name' => 'Latte',
            'description' => 'Latte is a coffee drink made with espresso and steamed milk, topped with a layer of foam.',
            'price' => 35000,
            'display_image_url' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93',
        ],
        [
            'category_id' => 1,
            'name' => 'Mocha',
            'description' => 'Mocha is a blend of coffee, chocolate, and steamed milk, often topped with whipped cream.',
            'price' => 40000,
            'display_image_url' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93',
        ],
        [
            'category_id' => 1,
            'name' => 'Flat White',
            'description' => 'Flat White is a coffee drink with a thin layer of microfoam over a double espresso shot.',
            'price' => 33000,
            'display_image_url' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93',
        ],
        [
            'category_id' => 1,
            'name' => 'Americano',
            'description' => 'Americano is a style of coffee prepared by diluting an espresso with hot water.',
            'price' => 32000,
            'display_image_url' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93',
        ],
        [
            'category_id' => 1,
            'name' => 'Macchiato',
            'description' => 'Macchiato is an espresso coffee drink with a small amount of milk, usually foamed.',
            'price' => 35000,
            'display_image_url' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93',
        ],
        [
            'category_id' => 2,
            'name' => 'Grilled Chicken Salad',
            'description' => 'Freshly grilled chicken served over a bed of lettuce, cherry tomatoes, and cucumbers.',
            'price' => 45000,
            'display_image_url' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93',
        ],
        [
            'category_id' => 2,
            'name' => 'Caesar Salad',
            'description' => 'A classic Caesar salad with romaine lettuce, croutons, parmesan cheese, and Caesar dressing.',
            'price' => 38000,
            'display_image_url' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93',
        ],
        [
            'category_id' => 2,
            'name' => 'Chicken Avocado Salad',
            'description' => 'A healthy mix of grilled chicken, fresh avocado, mixed greens, and a tangy vinaigrette.',
            'price' => 50000,
            'display_image_url' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93',
        ],
        [
            'category_id' => 2,
            'name' => 'Spicy Thai Chicken Salad',
            'description' => 'Tender chicken breast tossed in a spicy Thai peanut sauce over a bed of fresh greens.',
            'price' => 49000,
            'display_image_url' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93',
        ],
        [
            'category_id' => 2,
            'name' => 'Mediterranean Chicken Salad',
            'description' => 'Chicken, olives, feta cheese, and cherry tomatoes served with a lemon herb dressing.',
            'price' => 52000,
            'display_image_url' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93',
        ],
        [
            'category_id' => 2,
            'name' => 'BBQ Chicken Salad',
            'description' => 'Crispy chicken tossed in BBQ sauce over greens, with corn, black beans, and a ranch dressing.',
            'price' => 48000,
            'display_image_url' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93',
        ],
    ];


    private function getProducts()
    {
        return collect($this->products);
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->getProducts() as $product) {
            $product['currency'] = self::DEFAULT_CURRENCY;

            Product::create($product);
        }
    }
}

