<?php

namespace App\View\Components\Loader;

use App\Models\Loader\LoaderSetting as LoaderLoaderSetting;
use App\Models\Loader\LoaderText as LoaderLoaderText;
use Illuminate\View\Component;
use Mekad\Loader\Model\LoaderSetting;
use Mekad\Loader\Model\LoaderText;

class Index extends Component
{
    public $isEnabled;
    public $displayTime;
    public $bgColor;
    public $textColor;
    public $animationType;
    public $imageType;
    public $imagePath;
    public $videoPath;
    public $loaderText;
    public $primaryColor;
    
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $loaderSettings = LoaderLoaderSetting::getActive();
        $this->isEnabled = $loaderSettings->is_enabled;
        $this->displayTime = $loaderSettings->display_time;
        $this->bgColor = $loaderSettings->background_color;
        $this->textColor = $loaderSettings->text_color;
        $this->animationType = $loaderSettings->animation_type;
        $this->imageType = $loaderSettings->image_type;
        $this->imagePath = $loaderSettings->image_path;
        $this->videoPath = $loaderSettings->video_path;
        $this->primaryColor = 'blue-500';
        
        // تحديد النص المستخدم
        if ($loaderSettings->is_random_text) {
            $text = LoaderLoaderText::getRandomText();
            $this->loaderText = $text ? $text->text : 'جاري التحميل...';
        } else {
            $this->loaderText = $loaderSettings->default_text ?? 'جاري التحميل...';
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.loader.index');
    }
} 