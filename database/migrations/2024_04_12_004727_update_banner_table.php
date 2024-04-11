<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up(): void
    {
        // Check if the 'banner' table exists
        if (Schema::hasTable('banner')) {
            // If it exists, drop the 'banner' table
            Schema::dropIfExists('banner');
        }

        // Create the 'banner' table
        Schema::create('banner', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('text')->nullable();
            $table->string('url')->nullable();
            $table->bigInteger('sequence')->nullable();
            $table->string('image');
            $table->boolean('status');
            $table->timestamps();
            $table->softDeletes();
        });
        
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down(): void
    { 
        if (Schema::hasTable('banner')) {
            // If it exists, drop the 'banner' table
            Schema::dropIfExists('banner');
        }
        Schema::create('banner', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('text');
            $table->string('url');
            $table->bigInteger('sequence');
            $table->string('image');
            $table->boolean('status');
            $table->timestamps();
            $table->softDeletes();
        });

    }
};
