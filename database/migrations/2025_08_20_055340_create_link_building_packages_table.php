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
        Schema::create('link_building_packages', function (Blueprint $table) {
            $table->id();
            $table->enum('package_type', ['lite', 'standard', 'premium', 'customize'])->default('lite');
            $table->string('price');
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->string('features')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('link_building_packages');
    }
};
