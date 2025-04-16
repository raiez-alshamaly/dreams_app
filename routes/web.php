<?php

use App\Http\Controllers\ThemeSettingController;
use App\Models\Dream;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Models\ThemeSetting;
use Laravel\Fortify\Fortify;
use Laravel\Jetstream\Features;

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



View::composer('*', function ($view) {
    $theme = ThemeSetting::first();
    $view->with('theme', $theme);
});

Route::view('/', 'welcome', [
    'dreams' => Dream::paginate(10),
    "fulfilledDreams"=>Dream::query()->limit(10)->get(),
])->name('start');

Route::group(
    [
        'prefix' => 'dream/',
        'as' => 'dreams.'
    ],
    function () {
        // Route::get('create', [DreamController::class, 'create'])->name('create');
        // Route::post('store', [DreamController::class, 'store'])->name('store');
    }
);





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
