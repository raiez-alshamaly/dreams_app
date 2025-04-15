<?php

namespace Database\Seeders;

use App\Models\ThemeSetting;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Psy\Output\Theme;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(
            [
                UserSeeder::class,
                ThemeSettingSeeder::class,
            ]
        );
    }
}
