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
        Schema::create('website_orders', function (Blueprint $table) {
            $table->id();
            $table->string('website_url');
            $table->string('website_category');
            $table->string('website_language');
            $table->string('monthly_traffic')->default(0);
            $table->string('domain_authority')->default(0);
            $table->string('domain_rating')->default(0);
            $table->decimal('pricing', 10, 2)->default(0); // Better precision
            $table->enum('status', ['pending', 'inreview', 'rejected', 'approved'])->default('pending'); 
            $table->tinyInteger('is_active')->default(0);
            $table->timestamp('status_updated_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_orders');
    }
};
