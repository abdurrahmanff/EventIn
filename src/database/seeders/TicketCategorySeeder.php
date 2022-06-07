<?php

namespace Database\Seeders;

use App\Models\TicketCategory;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $tickets = [];

        for ($i=0; $i < 20; $i++) { 
            $tickets[] = [
                'event_id' => random_int(1, 20),
                'name' => $faker->text(5),
                'price' => random_int(1, 10)*10000,
                'status' => false,
                'count' => random_int(20, 100)
            ];
        }

        TicketCategory::insert($tickets);
    }
}