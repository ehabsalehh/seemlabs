<?php

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
//part one
Route::get('count-elements/{start}/{end}',\App\Http\Controllers\PartOne\CountElementsExceptController::class);
Route::get('string-index/{index}',\App\Http\Controllers\PartOne\StringIndexController::class);
Route::get('reduce-to-zero',\App\Http\Controllers\PartOne\ReduceToZeroController::class);
// part two
Route::post('register',[\App\Http\Controllers\Auth\UserAuthController::class,'register']);
Route::post('login',[\App\Http\Controllers\Auth\UserAuthController::class,'login']);

Route::group(["middleware"=>"auth:api"],function(){
   Route::apiResource('users',\App\Http\Controllers\UserController::class);
});
