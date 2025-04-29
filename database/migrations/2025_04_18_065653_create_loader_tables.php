<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('loader_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_enabled')->default(true);
            $table->integer('display_time')->default(3000); // وقت عرض اللودر بالميلي ثانية
            $table->string('background_color', 20)->default('#ffffff');
            $table->string('text_color', 20)->default('#333333');
            $table->enum('animation_type', ['fade', 'slide', 'bounce', 'pulse', 'typewriter'])->default('fade');           
            $table->boolean('is_random_text')->default(true);
            $table->string('default_text')->nullable();
            $table->enum('type', ['image', 'video' , 'empty'])->default('empty');
            $table->timestamps();
        });

        Schema::create('loader_texts', function (Blueprint $table) {
            $table->id();
            $table->text('text');
            $table->boolean('is_active')->default(true);
            $table->integer('display_order')->default(0);
            $table->timestamps();
        });

        Schema::create('loader_medias'  , function(Blueprint $table){
            $table->id();
            $table->foreignId('loader_setting_id')->nullable()->index();;
            $table->string('path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loader_settings');
        Schema::dropIfExists('loader_texts');
    }
};
