<?php

//use App\Http\Controllers\Api\ProductController;
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

Route::group(['middleware' => 'auth:sanctum'],function () {
    route::get('/user', function(Request $request) {
        return $request->user();
    });
    Route::post('/logout', 'AuthController@logout');

    Route::group(['prefix' => 'products'], function () {
        Route::post('/', 'ProductController@store');
        Route::put('/{product}', 'ProductController@update');
        Route::delete('/{product}', 'ProductController@destroy');
    });
});
Route::group(['prefix' => 'products'], function () {
    Route::get('/', 'ProductController@index');
    Route::get('/{product}', 'ProductController@show');
});
Route::post('/register', 'AuthController@register');

Route::post('/login', 'AuthController@login');

// Route prefix products


