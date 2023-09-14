<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PestController extends Controller
{

public function pestsAffectingField($fieldId)
{
    // Retrieve pests affecting a specific field by its ID
    $field = Field::find($fieldId);

    if (!$field) {
        return response()->json(['message' => 'Field not found'], 404);
    }

    $pests = $field->pests;

    return response()->json(['data' => $pests], 200);
}

public function searchByName(Request $request)
{
    $searchTerm = $request->input('searchTerm');

    $pests = Pest::where('name', 'like', '%' . $searchTerm . '%')->get();

    return response()->json(['data' => $pests], 200);
}

public function attachToField(Request $request, $pestId, $fieldId)
{
    $pest = Pest::find($pestId);
    $field = Field::find($fieldId);

    if (!$pest || !$field) {
        return response()->json(['message' => 'Pest or field not found'], 404);
    }

    $field->pests()->attach($pest);

    return response()->json(['message' => 'Pest attached to field successfully'], 200);
}
public function detachFromField($pestId, $fieldId)
{
    $pest = Pest::find($pestId);
    $field = Field::find($fieldId);

    if (!$pest || !$field) {
        return response()->json(['message' => 'Pest or field not found'], 404);
    }

    $field->pests()->detach($pest);

    return response()->json(['message' => 'Pest detached from field successfully'], 200);
}
public function statistics()
{
    // Example statistics query:
    $mostCommonPests = Pest::select('name')->groupBy('name')->orderByRaw('COUNT(*) DESC')->limit(5)->get();

    return response()->json(['mostCommonPests' => $mostCommonPests], 200);
}

}
