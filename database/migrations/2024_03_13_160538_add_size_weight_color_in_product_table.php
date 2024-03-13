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
        Schema::table('products', function (Blueprint $table) {
            $table->string('size')->after('selling')->nullable();
            $table->string('weight')->after('size')->nullable();
            $table->string('color')->after('weight')->nullable();
            $table->string('unit')->after('color')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('size');
            $table->dropColumn('weight');
            $table->dropColumn('color');
            $table->dropColumn('unit');
        });
    }
};
