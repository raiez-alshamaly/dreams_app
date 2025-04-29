<?php

namespace Database\Seeders;

use App\Models\Loader\LoaderSetting;
use App\Models\Loader\LoaderText;
use Illuminate\Database\Seeder;


class LoaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // إنشاء إعدادات اللودر الافتراضية
        $settings = LoaderSetting::create([
            'is_enabled' => true,
            'display_time' => 3000,
            'background_color' => '#ffffff',
            'text_color' => '#333333',
            'animation_type' => 'fade',
            'type' => 'empty',
            'is_random_text' => true,
            'default_text' => 'جاري التحميل...'
        ]);

        // إنشاء نصوص اللودر
        $texts = [
            'جاري تحميل الأحلام...',
            'نستعد لعرض عالم الأحلام...',
            'لحظة من فضلك، نجهز محتوى الموقع...',
            'عالم الأحلام في انتظارك...',
            'أهلاً بك في عالم الخيال والأحلام...'
        ];

        foreach ($texts as $text) {
            LoaderText::create([
                'text' => $text,
                'is_active' => true
            ]);
        }
    }
} 