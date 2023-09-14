<?php

namespace Database\Seeders;

use App\Pests;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pests::withoutEvents(function () {
            Pests::create(['name' => 'Aphid', 'description' => 'Small green insect']);
            Pests::create(['name' => 'Whitefly', 'description' => 'Tiny white insect']);
            Pests::create(['name' => 'Caterpillar', 'description' => 'Green worm-like insect']);
           
        });
    }
}
