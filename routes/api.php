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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'sites'], function() {
    Route::get('/', 'Api\SiteController@index');
    Route::get('{siteId}', 'Api\SiteController@getSite');
    Route::post('create', 'Api\SiteController@create');
});