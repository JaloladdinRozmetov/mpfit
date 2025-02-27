<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ru_RU'); // Use Russian locale

        $categories = Category::all();

        if ($categories->isEmpty()) {
            $this->command->info('Нет категорий! Заполните таблицу categories перед запуском ProductSeeder.');
            return;
        }

        foreach (range(1, 20) as $index) {
            Product::query()->create([
                'name' => $faker->word, // Generates a single random word
                'description' => $faker->sentence(10), // Generates a 10-word sentence
                'price' => $faker->randomFloat(2, 100, 5000), // Price between 100 and 5000 RUB
                'category_id' => $categories->random()->id, // Assign a random existing category
            ]);
        }

        $this->command->info('Товары успешно добавлены!');
    }
}
