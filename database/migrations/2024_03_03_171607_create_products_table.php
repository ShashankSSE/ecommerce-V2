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
            $table->string('name');
            $table->string('category');
            $table->text('short_Desc');
            $table->text('desc');
            $table->string('featured_img');
            $table->json('sizeArray')->nullable();
            $table->json('weightArray')->nullable();
            $table->json('unitArray')->nullable();
            $table->json('colorArray')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_desc')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_flash_sale')->default(false);
            $table->boolean('is_active')->default(true);
            $table->string('created_by');
            $table->timestamps();
            $table->softDeletes();
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
