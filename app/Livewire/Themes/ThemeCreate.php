<?php

namespace App\Livewire\Themes;

use Livewire\Component;
use Mekad\LaravelThemeCustomizer\Colors\ColorManager;
use Mekad\LaravelThemeCustomizer\Models\Theme;
use Mekad\LaravelThemeCustomizer\Models\ThemeColor;

class ThemeCreate extends Component
{
    public $colors = [];
    public $themeColor;
    public $colorShadows = [];
    public $themename;
    public function mount()
    {

        $this->themeColor = config('theme-customizer.default_colors');
        $this->colors = [
            'primary' => $this->themeColor['primary'],
            'secondary' => $this->themeColor['secondary'],
            'accent' => $this->themeColor['accent'],
            'warning' => $this->themeColor['warning'],
            'success' => $this->themeColor['success'],
            'highlight' => $this->themeColor['highlight'],
            'dark' => $this->themeColor['dark'],
            'neutral' => $this->themeColor['neutral'],
            'light' => $this->themeColor['light'],
        ];

        // Generate shadows for each color using ColorManager
        $colorManager = app(ColorManager::class);
        foreach ($this->colors as $name => $color) {
            $this->colorShadows[$name] = $colorManager->generateShadows($color);
        }

        $this->dispatch('color-changed', colors: $this->colors, colorShadows: $this->colorShadows);
    }

    public function updatedColors($value, $key)
    {
        // Regenerate shadows when colors update
        $colorManager = app(ColorManager::class);
        $this->colorShadows[$key] = $colorManager->generateShadows($value);
        $this->dispatch('color-changed', colors: $this->colors, colorShadows: $this->colorShadows);
    }

    public function save()
    {

        $this->validate([
            'themename' => 'required',
        ]);
        
        $theme = Theme::create([
            'key' => $this->themename ,
            'is_active' => 0 ,
            'is_global' => 1 
        ]);
        if($theme){
            $colors = ThemeColor::create([
                'theme_id' => $theme->id,
                ...$this->colors
            ]);
            if($colors){

            }else{
                // error 
            }
        }
            // dd($this->colors, $this->themename);
            session()->flash('message', 'Theme colors saved successfully!');
       
    }

    public function render()
    {
        return view('livewire.themes.theme-create');
    }
}
