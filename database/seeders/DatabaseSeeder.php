<?php

namespace Database\Seeders;
use App\Models\{Author, Category, Book, Rating};
use Faker\Factory as Faker;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $faker = Faker::create();

        // 1000 authors
        $authors = Author::factory()->count(1000)->create();

        // 3000 categories
        $categories = Category::factory()->count(3000)->create();

        // 100,000 books
        $books = collect();
        foreach (range(1, 100000) as $i) {
            $books->push(Book::create([
                'name' => $faker->sentence(3),
                'author_id' => $authors->random()->id,
                'category_id' => $categories->random()->id,
            ]));
        }

        // 500,000 ratings
        foreach (range(1, 500000) as $i) {
            Rating::create([
                'book_id' => $books->random()->id,
                'value' => rand(1, 10),
            ]);
        }
    }
}
