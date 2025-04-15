<?php

namespace Database\Seeders;

use App\Models\ThemeSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemeSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ThemeSetting::create([
            'key' => 'default',
            'primary-color' => '1a3a6c',
            'secondary-color' => '1e4d45',
            'light-primary' => '2c5eaa',
            'light-secondary' => '2a6b5f',
            'accent-color' => 'ffc107',
            'text-light' => 'f8f9fa',
            'text-dark' => '343a40',
            'dark-background' => '1a1a24',
        ]);
    }
}
