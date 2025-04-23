<?php

namespace App\Livewire\Themes;

use Livewire\Component;
use Mekad\LaravelThemeCustomizer\Models\Theme;
use Mekad\LaravelThemeCustomizer\Models\ThemeColor;
use Mekad\LaravelThemeCustomizer\Colors\ColorManager;
use Illuminate\Support\Facades\Log;

class ThemeEditor extends Component
{
    public $id;
    public $theme;
    public $colors = [];
    public $themeColor;
    public $colorShadows = []; // Store shadow variants

    public function mount()
    {
        $this->theme = Theme::findOrFail($this->id);
        $this->themeColor = ThemeColor::where('theme_id', $this->theme->id)->first();
        $this->colors = [
            'primary' => $this->themeColor->primary,
            'secondary' => $this->themeColor->secondary,
            'accent' => $this->themeColor->accent,
            'warning' => $this->themeColor->warning,
            'success' => $this->themeColor->success,
            'highlight' => $this->themeColor->highlight,
            'dark' => $this->themeColor->dark,
            'neutral' => $this->themeColor->neutral,
            'light' => $this->themeColor->light,
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
        Log::info('Saving colors: ' . json_encode($this->colors));

        try {
            if ($this->themeColor) {
                $this->themeColor->update($this->colors);
            } else {
                $this->themeColor = ThemeColor::create([
                    'theme_id' => $this->theme->id,
                    ...$this->colors
                ]);
            }
            session()->flash('message', 'Theme colors saved successfully!');
        } catch (\Exception $e) {
            Log::error('Failed to save colors: ' . $e->getMessage());
            session()->flash('message', 'Failed to save theme colors.');
        }
    }

    public function render()
    {
        return view('livewire.themes.theme-editor', [
            'colors' => $this->colors,
            'colorShadows' => $this->colorShadows,
        ]);
    }
}