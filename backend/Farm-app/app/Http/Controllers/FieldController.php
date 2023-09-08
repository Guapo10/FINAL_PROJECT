<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    // Create a new field record
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'size' => 'required|numeric',
            'location' => 'required|string',
            'soil_type' => 'required|string|max:255',
            'status'=> 'required|string|max:255',
           
        ]);

        // Create a new field record
        $field = Field::create($validatedData);

        return response()->json(['message' => 'Field created successfully', 'data' => $field], 201);
    }

  // Retrieve a list of all fields
  public function index()
  {
      // Retrieve all active fields
      $activeFields = Field::activeOrInactive()->get();


       // Retrieve all inactive fields
    $inactiveFields = Field::activeOrInactive(false)->get();

    
      // Retrieve all fields, including inactive ones
      $allFields = Field::activeOrInactive(false)->get();

      return response()->json(['activeFields' => $activeFields, 'allFields' => $allFields], 200);
  }

    // Retrieve a specific field by its ID
    public function show($id)
    {
        $field = Field::find($id);

        if (!$field) {
            return response()->json(['message' => 'Field not found'], 404);
        }

        return response()->json(['data' => $field], 200);
    }

    // Update a specific field by its ID
    public function update(Request $request, $id)
    {
        $field = Field::find($id);

        if (!$field) {
            return response()->json(['message' => 'Field not found'], 404);
        }

        

        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'size' => 'numeric',
            'location' => 'string',
            'soil_type' => 'required|string|max:255',
            'status'=> 'string',

        ]);

        $field->update($validatedData);

        return response()->json(['message' => 'Field updated successfully', 'data' => $field], 200);
    }


    public function filterByCropType($cropType)
    {
        // Retrieve fields that have a specific crop type
        $fields = Field::where('crop_type', $cropType)->get();

        return response()->json(['data' => $fields], 200);
    }

    // Soft delete a field by its ID
    public function softDelete($id)
    {
        $field = Field::find($id);
    
        if (!$field) {
            return response()->json(['message' => 'Field not found'], 404);
        }
    
        $field->delete(); // Soft delete the field
    
        return response()->json(['message' => 'Field soft deleted successfully'], 200);
    }
    
    // Restore a soft-deleted field by its ID
    public function restore($id)
    {
        $field = Field::withTrashed()->find($id);
    
        if (!$field) {
            return response()->json(['message' => 'Field not found'], 404);
        }
    
        $field->restore(); // Restore the soft-deleted field
    
        return response()->json(['message' => 'Field restored successfully'], 200);
    }
}