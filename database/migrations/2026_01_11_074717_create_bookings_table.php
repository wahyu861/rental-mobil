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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->integer('province_id');
            $table->string('province_name', 255);

            $table->integer('regency_id');
            $table->string('regency_name', 255);

            $table->integer('district_id');
            $table->string('district_name', 255);

            $table->integer('village_id');
            $table->string('village_name', 255);

            $table->string('name', 255);
            $table->string('address', 255);
            $table->string('phone', 20);

            $table->date('usage_date');
            $table->decimal('price', 10, 2);

            // user relation
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // car relation 
            $table->foreignId('car_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('car_name');

            $table->boolean('is_read')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
