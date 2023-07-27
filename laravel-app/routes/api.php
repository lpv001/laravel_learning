<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
// post get put delete

Route::group([
    'prefix' => 'user_route'
], function(){

    Route::post('register_new_user', [UserController::Class, 'register_user']);
    Route::get('get_all_user', [UserController::Class, 'get_users']);

});

Route::group([
    'prefix' => 'product'
], function(){

    

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
