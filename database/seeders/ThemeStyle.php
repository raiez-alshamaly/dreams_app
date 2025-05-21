<?php 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

DB::table('theme_styles')->insert([
'theme_id' => 1,
'primary' => '#1d4ed8',
'secondary' => '#64748b',
'accent' => '#d946ef',
'warning' => '#facc15',
'success' => '#10b981',
'highlight' => '#f97316',
'dark' => '#111827',
'neutral' => '#6b7280',
'light' => '#f3f4f6',
'created_at' => Carbon::now(),
'updated_at' => Carbon::now(),
]);