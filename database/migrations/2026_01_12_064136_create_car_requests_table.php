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
        Schema::create('car_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->foreignId('car_id')->constrained('cars');
            $table->decimal('car_price', 10, 2)->nullable();
            $table->string('province');
            $table->string('regency');
            $table->string('district');
            $table->string('village');
            $table->string('pickup_location');
            $table->date('pickup_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_requests');
    }
};
