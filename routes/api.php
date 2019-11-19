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

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'Auth\AuthController@login')->name('login');
    Route::post('register', 'Auth\AuthController@register');
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('user', 'Auth\AuthController@user');
        Route::post('user/addad', 'AdsController@addAd');
        Route::get('getads/{type}', 'AdsController@getads');
        Route::get('getad/{type}/{id}', 'AdsController@getad');
        Route::post('scan', 'CodesController@getBarcodes');
        Route::post('requestad', 'BuyingController@requestAd');
        Route::post('getad', 'BuyingController@getAd');
        Route::get('getrequests', 'BuyingController@getRequests');
        Route::get('getUserDataFromId/{id}', 'BuyingController@getUserDataFromId');
        Route::get('acceptrequest/{id}/{userId}', 'BuyingController@acceptRequest');
        Route::get('cancelrequest/{id}/{userId}', 'BuyingController@cancelRequest');
        Route::get('myads', 'AdsController@getMyAds');
        Route::post('addanswer', 'SurveyController@addAnswer');
    });
});
