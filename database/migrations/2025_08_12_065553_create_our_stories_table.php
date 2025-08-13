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
        Schema::create('our_stories', function (Blueprint $table) {
            $table->id();
            $table->string('section_title')->nullable();
            $table->string('section_title_two')->nullable();
            $table->string('section_title_three')->nullable();
            $table->longText('section_subtitle')->nullable();
            $table->string('title')->nullable();
            $table->longText('story_content')->nullable();
            $table->longText('story_content_two')->nullable();
            $table->longText('story_content_three')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_stories');
    }
};
