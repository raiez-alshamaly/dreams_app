<?php

use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AdminThemeController;
use Illuminate\Support\Facades\Route;
use Mekad\LaravelThemeCustomizer\Http\Controllers\ThemeController;

// disable old routes
$prefix = config('theme-customizer.routes.prefix');
$middleware = config('theme-customizer.routes.middleware');
$namePrefix = config('theme-customizer.routes.name_prefix');

Route::prefix($prefix)
    ->middleware($middleware)
    ->name($namePrefix)
    ->group(function () {
        Route::get('/',  function () {
            abort(404);
        })->name('show');
        Route::post('/', function () {
            abort(404);
        })->name('update');
        Route::post('/set-active', function () {
            abort(404);
        })->name('set-active');
        Route::post('/get-theme', function () {
            abort(404);
        })->name('get-theme');
        Route::delete('/delete', function () {
            abort(404);
        })->name('delete');

        // Route::get('/', [ThemeController::class, 'show'])->name('show');
        // Route::post('/', [ThemeController::class, 'update'])->name('update');
        // Route::post('/set-active', [ThemeController::class, 'setActive'])->name('set-active');
        // Route::post('/get-theme', [ThemeController::class, 'getTheme'])->name('get-theme');
        // Route::delete('/delete', [ThemeController::class, 'delete'])->name('delete');
    });


// end disable old route







Route::group(["prefix" => "admin", "as" => 'admin.themes.'], function () {
    Route::get('/themes', [AdminThemeController::class, 'index'])->name('index');
    Route::get('/themes/{id}', [AdminThemeController::class, 'show'])->name('show');
    Route::post('/' , [ThemeController::class , 'update'])->name('update');
    
});
