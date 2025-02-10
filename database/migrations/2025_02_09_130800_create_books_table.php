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
            $table->timestamps();
            $table->string('title')->unique();
            $table->date('write_at');
            $table->index('write_at');
            $table->foreignId('author_id')
                ->nullable()
                ->references('id')
                ->on('authors')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('publisher_id')
                ->nullable()
                ->references('id')
                ->on('publishers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
