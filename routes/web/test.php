<?php

use App\Models\Dream;
use Illuminate\Support\Facades\Route;

/**
 * Note : 
 * get all for Model return with out soft deleted items
 */

Route::group(["prefix"=> "/tests"], function () {

    Route::group(["prefix"=> "/db"], function () {
        Route::group(["prefix"=> "/dreams"], function () {
            Route::get("/defaultGetAll", function (){
                dd(Dream::all());
            });
            Route::get("/defaultQueryGet", function (){
                dd(Dream::query()->get());
            });
            Route::get('/withTrashed' , function (){
                dd(Dream::withTrashed()->get());
            });
        });
    });

});






