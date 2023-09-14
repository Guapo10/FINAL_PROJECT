<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Maintenance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MaintenanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Maintenance::withoutEvents(function () {
            // Insert dummy maintenance records
            Maintenance::create([
                'equipment_id' => 1, // Equipment ID
                'maintenance_date' => now(),
                'description' => 'Oil Change',
                'cost' => 200.00,
            ]);

            Maintenance::create([
                'equipment_id' => 2,
                'maintenance_date' => now(),
                'description' => 'Tire Replacement',
                'cost' => 150.00,
            ]);

            // Add more maintenance records as needed
        });
    }
}

