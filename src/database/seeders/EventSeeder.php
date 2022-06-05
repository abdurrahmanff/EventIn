<?php

namespace Database\Seeders;

use App\Models\Event;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $events = [];

        for ($i=0; $i < 20 ; $i++) { 
            $events[] = [
                'category_id' => random_int(1, 5),
                'user_id' => 11,
                'name' => $faker->name(),
                'desc' => $faker->text(),
                'schedule' => $faker->dateTime(),
                'place' => $faker->streetAddress(),
                'status' => 0,
            ];
        }

        Event::insert($events);
    }
}
