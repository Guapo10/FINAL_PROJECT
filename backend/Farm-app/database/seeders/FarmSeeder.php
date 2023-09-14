<?php

namespace Database\Seeders;

use App\Models\Farm;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FarmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Farm::withoutEvents(function () {
            // Insert dummy farm data
            Farm::create([
                'name' => 'Farm A',
                'location' => 'Location A',
                'size' => 100, // Acres or any appropriate unit
                'description' => 'This is Farm A description.',
                // Add other fields as needed
            ]);

            Farm::create([
                'name' => 'Farm B',
                'location' => 'Location B',
                'size' => 150,
                'description' => 'This is Farm B description.',
            ]);

            // Add more farm data as needed
        });
    }
}
