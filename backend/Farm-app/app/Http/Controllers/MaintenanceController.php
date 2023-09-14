<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\Maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    // Create a new maintenance record for a specific equipment
    public function store(Request $request, $equipmentId)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'maintenance_date' => 'required|date',
            'description' => 'nullable|string|max:255', // Description is optional, limited to 255 characters.
            'cost' => 'nullable|numeric|min:0', // Cost is optional and should be a non-negative number.
        ]);

        $equipment = Equipment::find($equipmentId);

        if (!$equipment) {
            return response()->json(['message' => 'Equipment not found'], 404);
        }

        // Create a new maintenance record associated with the equipment
        $maintenance = new Maintenance($validatedData);
        $equipment->maintenances()->save($maintenance);

        return response()->json(['message' => 'Maintenance created successfully', 'data' => $maintenance], 201);
    }

    // Retrieve maintenance records for a specific equipment
    public function index($equipmentId)
    {
        $equipment = Equipment::find($equipmentId);

        if (!$equipment) {
            return response()->json(['message' => 'Equipment not found'], 404);
        }

        $maintenances = $equipment->maintenances;

        return response()->json(['data' => $maintenances], 200);
    }

    // Retrieve a specific maintenance record by its ID
    public function show($equipmentId, $maintenanceId)
    {
        $equipment = Equipment::find($equipmentId);

        if (!$equipment) {
            return response()->json(['message' => 'Equipment not found'], 404);
        }

        $maintenance = Maintenance::where('equipment_id', $equipmentId)->find($maintenanceId);

        if (!$maintenance) {
            return response()->json(['message' => 'Maintenance record not found'], 404);
        }

        return response()->json(['data' => $maintenance], 200);
    }

    // Update a specific maintenance record by its ID
    public function update(Request $request, $equipmentId, $maintenanceId)
    {
        $equipment = Equipment::find($equipmentId);

        if (!$equipment) {
            return response()->json(['message' => 'Equipment not found'], 404);
        }

        $maintenance = Maintenance::where('equipment_id', $equipmentId)->find($maintenanceId);

        if (!$maintenance) {
            return response()->json(['message' => 'Maintenance record not found'], 404);
        }

        // Validate the incoming request data
        $validatedData = $request->validate([
            'maintenance_date' => 'date',
            'description' => 'nullable|string|max:255', // Description is optional, limited to 255 characters.
            'cost' => 'nullable|numeric|min:0', // Cost is optional and should be a non-negative number.
        ]);

        $maintenance->update($validatedData);

        return response()->json(['message' => 'Maintenance updated successfully', 'data' => $maintenance], 200);
    }

    // Soft delete a maintenance record by its ID
    public function softDelete($equipmentId, $maintenanceId)
    {
        $equipment = Equipment::find($equipmentId);

        if (!$equipment) {
            return response()->json(['message' => 'Equipment not found'], 404);
        }

        $maintenance = Maintenance::where('equipment_id', $equipmentId)->find($maintenanceId);

        if (!$maintenance) {
            return response()->json(['message' => 'Maintenance record not found'], 404);
        }

        $maintenance->delete(); // Soft delete the maintenance record

        return response()->json(['message' => 'Maintenance record soft deleted successfully'], 200);
    }

    // Restore a soft-deleted maintenance record by its ID
    public function restore($equipmentId, $maintenanceId)
    {
        $equipment = Equipment::find($equipmentId);

        if (!$equipment) {
            return response()->json(['message' => 'Equipment not found'], 404);
        }

        $maintenance = Maintenance::withTrashed()->where('equipment_id', $equipmentId)->find($maintenanceId);

        if (!$maintenance) {
            return response()->json(['message' => 'Maintenance record not found'], 404);
        }

        $maintenance->restore(); // Restore the soft-deleted maintenance record

        return response()->json(['message' => 'Maintenance record restored successfully'], 200);
    }
}
