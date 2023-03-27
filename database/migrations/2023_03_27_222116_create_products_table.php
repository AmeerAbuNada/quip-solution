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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('name_en');
            $table->string('name_ar');
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('catalog');
            $table->text('video_link');
            $table->boolean('is_active');
            $table->boolean('is_best_selling');
            $table->longText('description_en');
            $table->longText('description_ar');
            $table->longText('features_en');
            $table->longText('features_ar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
