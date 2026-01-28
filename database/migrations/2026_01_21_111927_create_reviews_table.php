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
            $table->foreignId('car_id')->constrained()->onDelete('cascade'); // ID mobil
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ID pengguna
            $table->string('username'); // Nama pengguna
            $table->decimal('rating', 2, 1); // Rating (misalnya 4.8)
            $table->date('review_date'); // Tanggal review
            $table->text('review_text'); // Teks review
            $table->boolean('status')->default(1);
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
