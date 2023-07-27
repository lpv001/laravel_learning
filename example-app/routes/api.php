<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;

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



Route::group([
    'prefix' => 'auth'
], function(){

    // http://localhost:8000/auth/register
    Route::post('register', [Api\UserController::class,'register_user']);

    // http://localhost:8000/auth/login
    Route::post('login', [Api\UserController::class, 'login_user']);

    // http://localhost:8000/auth/me
    Route::get('me', [Api\UserController::class, 'get_me']);

    Route::group(['middleware' => 'auth:sanctum'], function(){

        // http://localhost:8000/auth/get_all_user
        Route::get('get_all_user', [Api\UserController::class, 'get_users']);

        // http://localhost:8000/api/auth/update_user
        Route::put('update_user', [Api\UserController::class, 'update_user']);

        // http://localhost:8000/api/auth/delete_user?id=1
        Route::delete('delete_user', [Api\UserController::class, 'delete_user']);
        
    });

});

Route::group([
    'prefix' => 'product'
], function(){

    

});


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
