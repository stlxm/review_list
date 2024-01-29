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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->text('review_star');
            $table->text('review_text');
            $table->integer('isbn')->nullable(false); // nullable(false) でnullを許容しない
            $table->foreign('isbn')->references('isbn')->on('books');
            $table->integer('user_id')->nullable(false);
            $table->foreign('user_id')->refernces('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
