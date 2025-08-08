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
        Schema::create('banner_heroes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('sub_title');
            $table->longText('description')->nullable();
            $table->string('interested_in')->nullable();
            $table->string('button_one_name')->nullable();
            $table->string('button_one_url')->nullable();
            $table->string('button_two_name')->nullable();
            $table->string('button_two_url')->nullable();
            $table->string('guarantee_text')->nullable();
            $table->text('files')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banner_heroes');
    }
};
