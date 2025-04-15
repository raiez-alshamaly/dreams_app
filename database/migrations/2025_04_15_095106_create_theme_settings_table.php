<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('theme_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('primary-color');
            $table->string('secondary-color');
            $table->string('light-primary');
            $table->string('light-secondary');
            $table->string('accent-color');
            $table->string('text-light');
            $table->string('text-dark');
            $table->string('dark-background');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theme_settings');
    }
};
