<?php

namespace Database\Seeders;

use App\Models\Book;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            $book = new Book;

            $book->isbn = $faker->randomNumber(9);
            $book->title = $faker->name;
            $book->year = $faker->random('2010','2022');
            $book->publisher_id = $faker->random('1','20');
            $book->author_id = $faker->random('1','20');
            $book->catalog_id = $faker->rand('1','20');
            $book->qty = $faker->random('5','30');
            $book->price = $faker->random('1000','40000');

            $book->save();
        }
    }
}
