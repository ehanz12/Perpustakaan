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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('author_name')->nullable();
            $table->string('prince')->nullable();
            $table->text('description')->nullable();
            $table->string('quantity')->nullable();
            $table->string('book_img')->nullable();
            $table->string('author_img')->nullable();
            $table->foreignId('category_id')->constrained(
                table : 'categories',
                indexName:'category_book_id'
            )->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
