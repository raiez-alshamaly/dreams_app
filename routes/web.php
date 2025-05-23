<?php

use App\Enums\DreamStatusEnum;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\DreamController;
use App\Http\Middleware\BlockShowingNotAprovedDreamInfoMiddleware;
use App\Models\Dream;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::redirect('/dashboard', '/admin')->name('dashboard');
});

Fortify::registerView(function () {
    abort(404);
});





Route::view('/', 'welcome', [
    'dreams' => Dream::paginate(12),
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
Route::group(['as' => 'dreams.'], function () {
    // get all dreams
    // users can't show all dreams ( just admin) so block route
    // Route::get('/dreams', [DreamController::class, 'index'])->name('index');
    Route::get('/dreams/create', [DreamController::class, 'create'])->name('create');
    Route::post('/dreams', [DreamController::class, 'store'])->name('store');
    Route::get('/dreams/{dream}', [DreamController::class, 'show'])->middleware(BlockShowingNotAprovedDreamInfoMiddleware::class)->name('show');
    Route::get('/dreams/{dream}/edit', [DreamController::class, 'edit'])->name('edit');
    Route::match(['PUT', 'PATCH'], '/dreams/{dream}', [DreamController::class, 'update'])->name('update');
    Route::delete('/dreams/{dream}', [DreamController::class, 'destroy'])->name('destroy');
});










require_once __DIR__ .'/web/theme.php';
require_once __DIR__ .'/web/admin.php';
require_once __DIR__ .'/web/laoder.php';
require_once __DIR__ . '/web/test.php';

