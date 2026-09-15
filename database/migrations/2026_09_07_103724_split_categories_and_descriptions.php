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
        Schema::create('categories_new', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('category');
            $table->string('color')->default('#ffffff');

            $table->unique(['user_id', 'category']);
        });

        Schema::create('descriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('categories_new')->cascadeOnDelete();
            $table->string('description')->nullable();
            $table->string('color')->default('#ffffff');
        });

        DB::statement('
            INSERT INTO categories_new (user_id, category)
            SELECT DISTINCT user_id, category
            FROM categories
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
