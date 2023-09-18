<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function() {

    // data save
    // // {{env('API_URL')}}/api/account/save/"+id, formdata);
    //Route::post('{db}/{id?}', function () {
        // Route::get('{db}/save', function ($db,$id='') {
        //     return 'ApiController@savedata';
        // });  

        Route::post('{db}/save', 'ApiController@savedata');
        
    // data delete
    Route::get('{db}/delete/{id?}', function() {
        return 'ApiController@deletedata';
    });

     // select2 / combobox
    Route::get('select/{jr}', function() {
        return 'MainController@selectData';
    });

    // common load
    Route::get('common/{id?}', 'ApiController@getCommon');

    // form load
    Route::get('{db}/{id?}', 'ApiController@getData');

    // Route::prefix('{db}')->group(function () {
    //     Route::get('delete/{id?}', 'ApiController@delete');
    //     Route::post('{id?}', 'ApiController@savedata');
    //     Route::get('select/{jr?}', 'ApiController@seletData');
    // });

    
});

