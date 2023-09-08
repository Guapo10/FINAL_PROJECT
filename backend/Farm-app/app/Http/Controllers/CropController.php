<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use Illuminate\Http\Request;

class CropController extends Controller
{
    // Create a new crop record
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'crop_type' => 'required|string|max:255',
            'planting_date' => 'required|date',
            'harvesting_date' => 'required|date',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
            'status' => 'nullable|string',
            'owner_id' => 'nullable|integer|exists:users,id'
        ]);

        // Create a new crop record
        $crop = Crop::create($validatedData);

        return response()->json(['message' => 'Crop created successfully', 'data' => $crop], 201);
    }

    // Retrieve a list of all crops
    public function index()
    {
        $crops = Crop::all();

        return response()->json(['data' => $crops], 200);
    }

    // Retrieve a specific crop by its ID
    public function show($id)
    {
        $crop = Crop::find($id);

        if (!$crop) {
            return response()->json(['message' => 'Crop not found'], 404);
        }

        return response()->json(['data' => $crop], 200);
    }

    // Update a specific crop by its ID
    public function update(Request $request, $id)
    {
        $crop = Crop::find($id);

        if (!$crop) {
            return response()->json(['message' => 'Crop not found'], 404);
        }

        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'crop_type' => 'required|string|max:255',
            'planting_date' => 'required|date',
            'harvesting_date' => 'required|date',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
            'status' => 'nullable|string',
            'owner_id' => 'nullable|integer|exists:users,id'
        ]);

        $crop->update($validatedData);

        return response()->json(['message' => 'Crop updated successfully', 'data' => $crop], 200);
    }

     // Soft Delete a specific crop by its ID
     public function softDelete($id)
     {
         $crop = Crop::find($id);
 
         if (!$crop) {
             return response()->json(['message' => 'Crop not found'], 404);
         }
 
         $crop->delete();
 
         return response()->json(['message' => 'Crop soft deleted successfully'], 200);
     }
 
     // Restore a specific soft-deleted crop by its ID
     public function restore($id)
     {
         $crop = Crop::withTrashed()->find($id);
 
         if (!$crop) {
             return response()->json(['message' => 'Crop not found'], 404);
         }
 
         $crop->restore();
 
         return response()->json(['message' => 'Crop restored successfully'], 200);
     }
 
     // Permanently delete a specific soft-deleted crop by its ID
     public function forceDelete($id)
     {
         $crop = Crop::withTrashed()->find($id);
 
         if (!$crop) {
             return response()->json(['message' => 'Crop not found'], 404);
         }
 
         $crop->forceDelete();
 
         return response()->json(['message' => 'Crop permanently deleted successfully'], 200);
     }

    public function getStatus($id)
    {
        // Find the crop by ID
        $crop = Crop::find($id);

        if (!$crop) {
            // Handle the case where the crop with the given ID doesn't exist.
            return response()->json(['message' => 'Crop not found'], 404);
        }

        // Retrieve the status using the accessor
        $status = $crop->status;

        // Return the status as a response
        return response()->json(['status' => $status], 200);
    }
}
