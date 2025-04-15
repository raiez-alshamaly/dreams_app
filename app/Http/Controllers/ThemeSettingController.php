<?php
namespace App\Http\Controllers;
use App\Models\ThemeSetting;
use Illuminate\Http\Request;

class ThemeSettingController extends Controller
{
    public function edit()
    {
        $settings = ThemeSetting::all()->pluck('value', 'key');
        return view('dashboard.theme_settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->only(['background_color', 'text_color', 'btn_color']);

        foreach ($data as $key => $value) {
            ThemeSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return redirect()->back()->with('success', 'تم تحديث إعدادات الثيم بنجاح.');
    }
}
