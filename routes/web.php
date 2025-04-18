<?php

use App\Http\Controllers\DreamController;
use App\Http\Controllers\ThemeSettingController;
use App\Models\Dream;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard',['dreams' => Dream::all()]);
    })->name('dashboard');
});

Fortify::registerView(function () {
    abort(404);
});





Route::view('/', 'welcome', [
    'dreams' => Dream::paginate(10),
    "fulfilledDreams"=>Dream::query()->limit(10)->get(),
])->name('start');

/**
 * Actions Handled by Resource Controllers
 *   Verb 	    URI 	                Action 	    Route Name
 *   GET 	    /photos 	            index 	    photos.index
 *   GET 	    /photos/create 	        create 	    photos.create
 *   POST 	    /photos 	            store 	    photos.store
 *   GET 	    /photos/{photo} 	    show 	    photos.show
 *   GET 	    /photos/{photo}/edit 	edit 	    photos.edit
 *   PUT/PATCH 	/photos/{photo} 	    update 	    photos.update
 *   DELETE 	/photos/{photo} 	    destroy 	photos.destroy
 */
Route::group(['as' => 'dreams.'] , function(){
    // get all dreams
    Route::get('/dreams', [DreamController::class, 'index'])->name('index');
    Route::get('/dreams/create', [DreamController::class, 'create'])->name('create');
    Route::post('/dreams', [DreamController::class, 'store'])->name('store');
    Route::get('/dreams/{dream}', [DreamController::class, 'show'])->name('show');
    Route::get('/dreams/{dream}/edit', [DreamController::class, 'edit'])->name('edit');
    Route::match(['PUT', 'PATCH'],'/dreams/{dream}', [DreamController::class, 'update'])->name('update');
    Route::delete('/dreams/{dream}', [DreamController::class, 'destroy'])->name('destroy');

});





Route::group(['prefix' => 'admin/'], function () {

    // Route::post('fulfill_dream', [DashboardController::class, 'fulfill_dream']);
    // Route::get('random', [DashboardController::class, 'random_dream']);
    // Route::post('dream/delete', [DreamController::class, 'delete_dream']);
    // Route::post('dream/accept', [DreamController::class, 'accept']);
});



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/theme-settings', [ThemeSettingController::class, 'edit'])->name('theme-settings.edit');
    Route::put('/dashboard/theme-settings', [ThemeSettingController::class, 'update'])->name('theme-settings.update');
});

require_once __DIR__ .'/web/test.php';