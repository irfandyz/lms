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
        Schema::create('lecture_user', function (Blueprint $table) {
            $table->id();
            $table->integer('lecture_id')->constrained('lectures')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
        Schema::create('category_user', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->constrained('categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
        Schema::create('category_lecture', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->constrained('categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('lecture_id')->constrained('lectures')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
        Schema::create('lesson_user', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('lesson_id')->constrained('lessons')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecture_user');
        Schema::dropIfExists('category_user');
        Schema::dropIfExists('category_lecture');
        Schema::dropIfExists('lesson_user');
    }
};
