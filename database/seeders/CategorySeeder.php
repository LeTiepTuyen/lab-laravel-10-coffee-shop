<?php
namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Seeder;
class CategorySeeder extends Seeder
{
    public $categories = [
        [
            'name' => 'Cafe',
            'description' => '',
        ],
        [
            'name' => 'Chicken',
            'description' => '',
        ],
    ];
    private function getCategories()
    {
        return $this->categories;
    }
    public function run(): void
    {
        foreach ($this->getCategories() as $category) {
            Category::create($category);
        }
    }
}
