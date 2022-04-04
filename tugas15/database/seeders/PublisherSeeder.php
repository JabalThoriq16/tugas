<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i <20 ; $i++) { 
            $publis = new Publisher;

            $publis->name = $faker->name;
            $publis->email = $faker->email;
            $publis->phone_number = '0852'.$faker->randomNumber(8);
            $publis->address = $faker->address;

            $publis->save();
        }
    }
}
