<?php

use App\Http\Controllers\Admin\AdminDreamController;
use App\Http\Controllers\Admin\AdminPageController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.' ,'middleware' => ['auth']], function () {
    Route::get('/', [AdminPageController::class, 'dashboard'])->name('index');
    Route::get('/dreams', [AdminPageController::class, 'dreams'])->name('dreams');
    Route::group(['prefix' => '/dreams' ,  'as' =>'dreams.'], function(){
            Route::get('/{id}' , [AdminDreamController::class , 'show'])->name('show');
            Route::get('/step/{id}' , [AdminDreamController::class , 'editStep' ])->name('steps.edit');
    });
  
});


