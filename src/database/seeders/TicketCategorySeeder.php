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
                'event_id' => $i+27,
                'name' => $faker->word(),
                'price' => random_int(1, 10)*10000,
                'count' => random_int(20, 100)
            ];
        }

        TicketCategory::insert($tickets);
    }
}
