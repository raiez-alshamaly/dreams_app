<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = [
            'loader_type' => Setting::getValue('loader_type', 'image'),
            'loader_text' => Setting::getValue('loader_text', 'جاري التحميل...'),
            'loader_image' => Setting::getValue('loader_image'),
            'loader_video' => Setting::getValue('loader_video'),
        ];
        
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'loader_type' => 'required|in:image,video',
            'loader_text' => 'required|string|max:255',
            'loader_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'loader_video' => 'nullable|mimes:mp4,mov,ogg|max:10240',
        ]);

        Setting::setValue('loader_type', $request->loader_type);
        Setting::setValue('loader_text', $request->loader_text);

        if ($request->hasFile('loader_image')) {
            $path = $request->file('loader_image')->store('public/loader');
            Setting::setValue('loader_image', Storage::url($path), 'image');
        }

        if ($request->hasFile('loader_video')) {
            $path = $request->file('loader_video')->store('public/loader');
            Setting::setValue('loader_video', Storage::url($path), 'video');
        }

        return redirect()->back()->with('success', 'تم تحديث الإعدادات بنجاح');
    }
} 