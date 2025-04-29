<?php

namespace App\Livewire\Loader;

use App\Models\Loader\LoaderMedia;
use App\Models\Loader\LoaderSetting;
use App\Models\Loader\LoaderText;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class LoaderEditor extends Component
{
    use WithFileUploads ;
    public $loader;
    public $texts;
    public $isEnable;
    public $time;
    public $bgcolor;
    public $textcolor;
    public $animation;
    public $isRandmoText;
    public $defaultText;
    public $media ;
    public $loaderMedia;
    public $type = 'empty';
    public $savedMedia;


    public function mount()
    {
        $this->loader = LoaderSetting::getActive();
        $this->loaderMedia = LoaderMedia::where('loader_setting_id' , $this->loader->id)->first();
        $this->savedMedia = $this->loaderMedia ;
        $this->isEnable = $this->loader->is_enabled ? 1 : 0;
        $this->time  = $this->loader->display_time;
        $this->bgcolor = $this->loader->background_color;
        $this->defaultText = $this->loader->default_text ;
        $this->textcolor = $this->loader->text_color;
        $this->animation = $this->loader->animation_type;
        $this->isRandmoText = $this->loader->is_random_text;
        $this->type = $this->loader->type;
        $this->texts = LoaderText::all();
    }

    public function save()
    {
        try {
            $this->loader->is_enabled  =  $this->isEnable;
            $this->loader->display_time = $this->time;
            $this->loader->background_color = $this->bgcolor  ;
            $this->loader->default_text = $this->defaultText ;
            $this->loader->text_color  = $this->textcolor;
            $this->loader->animation_type = $this->animation;
            $this->loader->is_random_text = $this->isRandmoText;
            $this->loader->type = $this->type;
            $this->loader->save();
            if ($this->media) {
                    if($this->loaderMedia){
                       $this->deleteMedia($this->loaderMedia->id);
                    }
                    $extension = $this->media->getClientOriginalExtension();
                    $file_name = $this->loader->id . '_' . time() . '.' . $extension;
                    $path = $this->media->storeAs('uploads/imgs/loaders', $file_name, 'public');
                    $file =  new LoaderMedia();
                    $file->loader_setting_id = $this->loader->id;
                    $file->path = $path;
                    $file->save();
                  
               
            }
            $this->mount();
            $this->render();
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
    public function deleteMedia($id)
    {
        $media = LoaderMedia::find($id);
        if ($media) {
            if (Storage::disk('public')->exists($media->path)) {
                Storage::disk('public')->delete($media->path);
            }
            $media->delete();

            $this->mount();
            $this->render();
        }
    }
    public function render()
    {
        return view('livewire.loader.loader-editor');
    }
}
