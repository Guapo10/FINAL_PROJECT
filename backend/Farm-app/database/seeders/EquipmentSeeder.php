<?php

namespace Database\Seeder;

use Illuminate\Database\Seeder;
use App\Models\Equipment;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Equipment::withoutEvents(function () {
            // Insert dummy equipment data
            Equipment::create([
                'name' => 'Tractor',
                'description' => 'Heavy-duty tractor',
                'purchase_date' => now(),
                'usage_hours' => 1000,
            ]);

            Equipment::create([
                'name' => 'Plow',
                'description' => 'Agricultural plowing equipment',
                'purchase_date' => now(),
                'usage_hours' => 800,
            ]);

            Equipment::create([
                'name' => 'Harvester',
                'description' => 'Crop harvesting machine',
                'purchase_date' => now(),
                'usage_hours' => 1200,
            ]);

            // Add more equipment data as needed
        });
    }
}
