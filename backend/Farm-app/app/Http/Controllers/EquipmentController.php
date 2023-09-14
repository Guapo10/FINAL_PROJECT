<?php

namespace App\Http\Controllers;

use App\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    // Create a new equipment record
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'string',
            'purchase_date' => 'required|date',
            'usage_hours' => 'numeric',
        ]);

        // Create a new equipment record
        $equipment = Equipment::create($validatedData);

        return response()->json(['message' => 'Equipment created successfully', 'data' => $equipment], 201);
    }

    // Retrieve a list of all equipment
    public function index()
    {
        $equipment = Equipment::all();

        return response()->json(['data' => $equipment], 200);
    }

    // Retrieve a specific equipment by its ID
    public function show($id)
    {
        $equipment = Equipment::find($id);

        if (!$equipment) {
            return response()->json(['message' => 'Equipment not found'], 404);
        }

        return response()->json(['data' => $equipment], 200);
    }

    // Update a specific equipment by its ID
    public function update(Request $request, $id)
    {
        $equipment = Equipment::find($id);

        if (!$equipment) {
            return response()->json(['message' => 'Equipment not found'], 404);
        }

        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'description' => 'string',
            'purchase_date' => 'date',
            'usage_hours' => 'numeric',
        ]);

        $equipment->update($validatedData);

        return response()->json(['message' => 'Equipment updated successfully', 'data' => $equipment], 200);
    }

    // Soft delete an equipment by its ID
    public function softDelete($id)
    {
        $equipment = Equipment::find($id);

        if (!$equipment) {
            return response()->json(['message' => 'Equipment not found'], 404);
        }

        $equipment->delete(); // Soft delete the equipment

        return response()->json(['message' => 'Equipment soft deleted successfully'], 200);
    }

    // Restore a soft-deleted equipment by its ID
    public function restore($id)
    {
        $equipment = Equipment::withTrashed()->find($id);

        if (!$equipment) {
            return response()->json(['message' => 'Equipment not found'], 404);
        }

        $equipment->restore(); // Restore the soft-deleted equipment

        return response()->json(['message' => 'Equipment restored successfully'], 200);
    }
}
