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
        Schema::create('why_chose_us', function (Blueprint $table) {
            $table->id();
            $table->text('title_one')->nullable();
            $table->longText('description_one')->nullable();
            $table->string('image_one')->nullable();

            $table->text('title_two')->nullable();
            $table->longText('description_two')->nullable();
            $table->string('image_two')->nullable();

            $table->text('title_three')->nullable();
            $table->longText('description_three')->nullable();
            $table->string('image_three')->nullable();

            $table->text('title_four')->nullable();
            $table->longText('description_four')->nullable();
            $table->string('image_four')->nullable();

            $table->text('title_five')->nullable();
            $table->longText('description_five')->nullable();
            $table->string('image_five')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('why_chose_us');
    }
};
