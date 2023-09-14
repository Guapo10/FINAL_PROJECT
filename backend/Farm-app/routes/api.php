<?php

use App\Http\Controllers\CropController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FieldController;
use App\Models\Crop; 
use App\Models\Field; 



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// // Route::get('/employees', [EmployeeController::class, 'index']);
// Route::resource('crops', CropController::class);
// Route::resource('fields', FieldController::class);
// Route::delete('/crops/{crop}', 'CropController@destroy');
// Route::delete('fields/{id}', function ($id) {
    
// });
Route::get('crops/{id}/status', [CropController::class, 'getStatus']);
Route::resource('fields', FieldController::class);
Route::get('fields/{fieldId}/pests', 'PestController@pestsAffectingField');
Route::get('pests/search', 'PestController@searchByName');
Route::post('pests/{pestId}/fields/{fieldId}', 'PestController@attachToField');
Route::delete('pests/{pestId}/fields/{fieldId}', 'PestController@detachFromField');
Route::get('pests/statistics', 'PestController@statistics');


// Equipment routes
Route::resource('equipment', 'EquipmentController')->except(['create', 'edit']);
Route::delete('equipment/{id}/soft-delete', 'EquipmentController@softDelete');
Route::put('equipment/{id}/restore', 'EquipmentController@restore');

// Maintenance routes
Route::post('equipment/{equipmentId}/maintenance', 'MaintenanceController@store');
Route::get('equipment/{equipmentId}/maintenance', 'MaintenanceController@index');
Route::get('equipment/{equipmentId}/maintenance/{maintenanceId}', 'MaintenanceController@show');
Route::put('equipment/{equipmentId}/maintenance/{maintenanceId}', 'MaintenanceController@update');
Route::delete('equipment/{equipmentId}/maintenance/{maintenanceId}', 'MaintenanceController@softDelete');
Route::put('equipment/{equipmentId}/maintenance/{maintenanceId}/restore', 'MaintenanceController@restore');

//weather routes
Route::get('weather/{location}', 'WeatherController@getWeather');
