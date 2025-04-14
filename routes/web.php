<?php

use Illuminate\Support\Facades\Route;


Route::view('/' ,'welcome' ,[
    'dreams' => [],
    'fulfilledDreams' => [],
])->name('start');

Route::group(
    [
        'prefix' => 'dream/',
        'as' => 'dreams.'
    ],
    function () {
        Route::get('create', [DreamController::class, 'create'])->name('create');
        Route::post('store', [DreamController::class, 'store'])->name('store');
    }
);





Route::group(['prefix' => 'admin/'], function () {
   
    Route::post('fulfill_dream', [DashboardController::class, 'fulfill_dream']);
    Route::get('random', [DashboardController::class, 'random_dream']);
    Route::post('dream/delete', [DreamController::class, 'delete_dream']);
    Route::post('dream/accept' , [DreamController::class , 'accept']);
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
