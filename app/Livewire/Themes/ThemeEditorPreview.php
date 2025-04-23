<?php

namespace App\Livewire\Themes;

use Livewire\Attributes\On;
use Livewire\Component;

class ThemeEditorPreview extends Component
{
    public $colors = [];
    public $colorShadows = [];

    // public function mount()
    // {
    //     $this->colors = session('colors', []);
    //     $this->colorShadows = session('colorShadows', []);
    // }

    #[On("color-changed")]
    public function updateColors($colors, $colorShadows)
    {
        $this->colors = $colors;
        $this->colorShadows = $colorShadows;
        // session(['colors' => $this->colors, 'colorShadows' => $this->colorShadows]);
    }

    public function render()
    {
        return view('livewire.themes.theme-editor-preview', [
            'colors' => $this->colors,
            'colorShadows' => $this->colorShadows,
        ]);
    }
}