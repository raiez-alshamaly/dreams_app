<?php
namespace App\Http\Controllers;
use App\Models\ThemeSetting;
use Illuminate\Http\Request;

class ThemeSettingController extends Controller
{
    public function edit()
    {
        $theme = ThemeSetting::first(); // نفترض في صف واحد فقط
        dd($theme);
        return view('dashboard.theme_settings.edit', compact('theme'));
    }

    public function update(Request $request)
    {
        $theme = ThemeSetting::first();
        $data = $request->only([
            'primary-color', 'secondary-color',
            'light-primary', 'light-secondary',
            'accent-color', 'text-light',
            'text-dark', 'dark-background'
        ]);

        if ($theme) {
            $theme->update($data);
        }

        return redirect()->route('theme-settings.edit')->with('success', 'تم حفظ إعدادات الثيم');
    }
}
