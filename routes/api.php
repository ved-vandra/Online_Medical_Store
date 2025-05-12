<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\apicontroller;
use App\Http\Controllers\apitokencontroller;

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

Route::post('/register','apicontroller@register');
Route::post('/login','apicontroller@store');

Route::get('/em','apicontroller@index');
Route::post('/em','apicontroller@store');
Route::get('/em/{id}','apicontroller@show');
Route::put('/em/{id}','apicontroller@update');
Route::delete('/em/{id}','apicontroller@destroy');
Route::get('/em/search/{id}','apicontroller@search');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
