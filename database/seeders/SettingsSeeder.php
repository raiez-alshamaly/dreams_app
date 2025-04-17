<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        $settings = [
            [
                'key' => 'loader_type',
                'value' => 'image',
                'type' => 'text'
            ],
            [
                'key' => 'loader_text',
                'value' => 'جاري التحميل...',
                'type' => 'text'
            ],
            [
                'key' => 'loader_image',
                'value' => null,
                'type' => 'image'
            ],
            [
                'key' => 'loader_video',
                'value' => null,
                'type' => 'video'
            ]
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
} 