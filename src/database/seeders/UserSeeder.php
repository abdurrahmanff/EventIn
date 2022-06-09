<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id-ID');
        User::insert([
            [
                'role_id' => 1,
                'name' => 'Admin YZ',
                'email' => 'adminyz@event.in',
                'password' => Hash::make('passwordadminyz'),
                'phone_num' => $faker->phoneNumber(),
                'birth' => $faker->date(
                    max: new Carbon('first day of January 2001')
                )
            ],
            [
                'role_id' => 2,
                'name' => $faker->name(),
                'email' => 'eoganteng@gcoder.me',
                'password' => Hash::make('passwordeoganteng'),
                'phone_num' => $faker->phoneNumber(),
                'birth' => $faker->date(
                    max: new Carbon('first day of January 2001')
                )
            ]
        ]);
    }
}
