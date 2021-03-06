<?php

use App\Http\Controllers\RelationDemoController;
use App\Http\Controllers\TemporaryController;
use App\Http\Controllers\TransformerDemoController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', TemporaryController::class);
Route::get('/getDummyResult', [TemporaryController::class, 'getDummyResult']);
Route::get('/relationDemo', RelationDemoController::class);
Route::get('/relationDemo/relationSql', [RelationDemoController::class, 'relationSql']);
Route::get('/transformerDemo', TransformerDemoController::class);
