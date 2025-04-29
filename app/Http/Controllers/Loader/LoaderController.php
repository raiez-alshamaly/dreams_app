<?php

namespace App\Http\Controllers\Loader;

use App\Http\Controllers\Controller;
use App\Models\Loader\LoaderSetting;
use App\Models\Loader\LoaderText;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LoaderController extends Controller
{
    
    public function index(){
        $settings = LoaderSetting::getActive();
        $texts = LoaderText::all();
        
        return view('admin.loader', [
            'loader' => $settings,
            'texts' => $texts
        ]);
    }


    public function update(Request $request){
         // التحقق من البيانات
         $data = $request->validate([
            'is_enabled' => 'required|boolean',
            'display_time' => 'required|integer|min:500',
            'background_color' => 'required|string|max:20',
            'text_color' => 'required|string|max:20',
            'animation_type' => 'required|string|in:fade,slide,bounce,pulse,typewriter',
            'image_type' => 'required|string|in:image,video,none',
            'image_upload' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video_upload' => 'nullable|mimes:mp4,webm,ogg|max:10240',
            'is_random_text' => 'required|boolean',
            'default_text' => 'nullable|string',
        ]);
        
        // إعداد البيانات للحفظ
        $settingsData = [
            'is_enabled' => $data['is_enabled'],
            'display_time' => $data['display_time'],
            'background_color' => $data['background_color'],
            'text_color' => $data['text_color'],
            'animation_type' => $data['animation_type'],
            'image_type' => $data['image_type'],
            'is_random_text' => $data['is_random_text'],
            'default_text' => $data['default_text'],
        ];
        if ($request->hasFile('image_upload') && $data['image_type'] === 'image') {
            // حذف الصورة القديمة إذا وجدت
            $settings = LoaderSetting::getActive();
            if ($settings->image_path) {
                Storage::disk('public')->delete($settings->image_path);
            }
            
            // حفظ الصورة الجديدة
            $imagePath = $request->file('image_upload')->store('loader-images', 'public');
            $settingsData['image_path'] = $imagePath;
        }
        
        // معالجة ملف الفيديو
        if ($request->hasFile('video_upload') && $data['image_type'] === 'video') {
            // حذف الفيديو القديم إذا وجد
            $settings = LoaderSetting::getActive();
            if ($settings->video_path) {
                Storage::disk('public')->delete($settings->video_path);
            }
            
            // حفظ الفيديو الجديد
            $videoPath = $request->file('video_upload')->store('loader-videos', 'public');
            $settingsData['video_path'] = $videoPath;
        }
          // حفظ الإعدادات
          LoaderSetting::saveSettings($settingsData);
        
          return response()->json([
              'success' => true,
              'message' => 'تم تحديث إعدادات اللودر بنجاح'
          ]);
    }
}
