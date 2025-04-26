<?php

use App\Http\Controllers\Admin\AdminDreamController;
use App\Http\Controllers\Admin\AdminPageController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [AdminPageController::class, 'dashboard'])->name('index');
    Route::get('/dreams', [AdminPageController::class, 'dreams'])->name('dreams');
    Route::get('/loader', [AdminPageController::class, 'loader'])->name('loader');
    Route::group(['prefix' => '/dreams' ,  'as' =>'dreams.'], function(){
            Route::get('/{id}' , [AdminDreamController::class , 'show'])->name('show');
    });
    // Route::post('fulfill_dream', [DashboardController::class, 'fulfill_dream']);
    // Route::get('random', [DashboardController::class, 'random_dream']);
    // Route::post('dream/delete', [DreamController::class, 'delete_dream']);
    // Route::post('dream/accept', [DreamController::class, 'accept']);
});


