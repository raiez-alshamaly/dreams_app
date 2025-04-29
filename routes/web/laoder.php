<?php

use App\Http\Controllers\Loader\LoaderController;
use App\Http\Controllers\Loader\LoaderTextController;
use App\Loader\Animations\AnimationFactory;
use App\Loader\Builders\LoaderBuilder;
use App\Loader\LoaderFactory;
use App\Loader\Spinners\LoaderSpinner;
use App\Loader\Texts\NormalLoaderText;
use App\Models\Loader\LoaderMedia;
use App\Models\Loader\LoaderSetting;
use App\Models\Loader\LoaderText;
use Illuminate\Support\Facades\Route;






// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {


    // إعدادات اللودر

    Route::group(['as' => 'loader.'], function () {
        Route::get('/loader', [LoaderController::class, 'index'])->name('index');
        Route::post('/laoder/edit',  [LoaderController::class, 'update'])->name('update');

        // loader-text 
        Route::group(['prefix' => '/loader', 'as' => 'text.'], function () {
            Route::get('/text/create' , [LoaderTextController::class , 'create'])->name('create');
            Route::get('/text/{id}', [LoaderTextController::class, 'show'])->name('show');
            Route::post('/text',  [LoaderTextController::class, 'store'])->name('store');
            Route::put('/text/{id}', [LoaderTextController::class, 'update'])->name('update');
           
        });
    });
});

Route::get('/loader-test', function () {
    $loaderSettings = LoaderSetting::getActive();
    $loaderText = " ";
    if ($loaderSettings->is_enabled) {
        if ($loaderSettings->is_random_text) {
            $text = LoaderText::getRandomText();
            $loaderText = $text ? $text->text : 'جاري التحميل...';
        } else {
            $loaderText = $loaderSettings->default_text ?? 'جاري التحميل...';
        }
        $contentLaoder = "";
        if ($loaderSettings->type == 'empty') {
            $contentLaoder =  new LoaderSpinner();
        } else {
            $loaderMedia =  LoaderMedia::where('loader_setting_id', $loaderSettings->id)->first();
            $contentLaoder = "" . $loaderMedia->path;
        }
        // set Variables 
        $animation = AnimationFactory::create($loaderSettings->animation_type);
        $text = new NormalLoaderText($loaderText, $loaderSettings->text_color, $animation);
        // dd($text);
        $loader = LoaderFactory::create($loaderSettings->type, $contentLaoder);
        $builder = new  LoaderBuilder($loader, $text);

        dd($builder->build());
        return $builder->build();
    }
});
