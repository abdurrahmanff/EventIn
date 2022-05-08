<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            ['id' => 1,
             'name' => 'concert'],
            ['id' => 2,
             'name' => 'seminar'],
            ['id' => 3,
             'name' => 'workshop'],
            ['id' => 4,
             'name' => 'variety'],
            ['id' => 5,
             'name' => 'other'],
        ]);
    }
}
