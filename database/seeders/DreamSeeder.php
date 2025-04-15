<?php

namespace Database\Seeders;

use App\Models\Dream;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DreamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Dream::factory(100)->create();
    }
}
