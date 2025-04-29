<?php

namespace App\Providers;

use App\Loader\Animations\AnimationFactory;
use App\Loader\Builders\LoaderBuilder;
use App\Loader\LoaderFactory;
use App\Loader\Spinners\LoaderSpinner;
use App\Loader\Texts\NormalLoaderText;
use App\Models\Loader\LoaderMedia;
use App\Models\Loader\LoaderMidea;
use App\Models\Loader\LoaderSetting;
use App\Models\Loader\LoaderText;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class LoaderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            try {
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
                    $loader = LoaderFactory::create($loaderSettings->type, $contentLaoder);

                    $loader->setBgColor($loaderSettings->background_color);
                    $builder = new  LoaderBuilder($loader, $text);

                    $view->with([
                        'loaderHtml' => $builder->build(),
                        'isEnabled' => $loaderSettings->is_enabled,
                        'displayTime' => $loaderSettings->display_time,
                    ]);
                }
            } catch (\Exception $e) {
                // في حالة عدم وجود جداول قاعدة البيانات، نتجاهل الخطأ
            }
        });
    }
}
