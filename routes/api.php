<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function() {

    // data delete
    Route::get('{db}/delete/{id?}', function() {
        return 'ApiController@deletedata';
    });

     // select2 / combobox
    Route::get('select/{jr}', function() {
        return 'MainController@selectData';
    });
    // data save
    Route::post('{db}/{id?}', function () {
        return 'ApiController@savedata';
    });

    // form load
    Route::get('{db}/{id?}', function (){
        return '{db}/{id?}';
    });

    // Route::prefix('{db}')->group(function () {
    //     Route::get('delete/{id?}', 'ApiController@delete');
    //     Route::post('{id?}', 'ApiController@savedata');
    //     Route::get('select/{jr?}', 'ApiController@seletData');
    // });

    
});

