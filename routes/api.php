<?php

use Illuminate\Http\Request;

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

Route::namespace('Api')->group(function () {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::get('activate/{token}', 'AuthController@activate');

    Route::prefix('company')->middleware('auth:api')->group(function () {
        Route::get('/', 'CompanyController@index');
        Route::put('/', 'CompanyController@update');

        Route::apiResources([
            'department' => 'DepartmentController',
            'department.jobtitle' => 'JobTitleController',
        ]);
    });
});
