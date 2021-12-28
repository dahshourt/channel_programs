<?php

use App\Http\Controllers\ChannelsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('channels',[\App\Http\Controllers\channels\ChannelsController::class,'index']);
Route::Post('channels',[\App\Http\Controllers\channels\ChannelsController::class,'create']);
Route::put('channels/{channels}',[\App\Http\Controllers\channels\ChannelsController::class,'update']);
Route::delete('channels/{channels}',[\App\Http\Controllers\channels\ChannelsController::class,'destroy']);

Route::post('channels/{channel}/programs',[\App\Http\Controllers\program\ProgramsController::class,'create']);

Route::put('channels/{channel}/programs/{programs}',[\App\Http\Controllers\program\ProgramsController::class,'update']);
Route::get('channels/{channel}/{date}',[\App\Http\Controllers\program\ProgramsController::class,'programs']);