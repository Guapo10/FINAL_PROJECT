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
