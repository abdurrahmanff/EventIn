<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
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
                'name' => random_int(1, 4),
                'desc' => $faker->text(100),
                'price' => random_int(1, 10)*10000,
                'status' => false
            ];
        }

        Ticket::insert($tickets);
    }
}
