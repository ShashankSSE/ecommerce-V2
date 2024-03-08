<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'category')) {
                DB::statement('ALTER TABLE products DROP COLUMN category');
            }
        
            // Add a new bigInteger unsigned column for category
            $table->bigInteger('category')->unsigned()->nullable()->after('name');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {

            if (Schema::hasColumn('products', 'category')) {
                DB::statement('ALTER TABLE products DROP COLUMN category');
            }
            $table->string('category')->nullable()->after('id');
        });
    }
};
