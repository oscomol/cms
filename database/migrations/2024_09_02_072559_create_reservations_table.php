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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedInteger('userId');
            $table->string('contactPerson');
            $table->string('email');
            $table->string('foodTime');
            $table->string('endTime');
            $table->string('functionDate');
            $table->string('functionType');
            $table->string('isSurprised');
            $table->string('name');
            $table->unsignedInteger('numOfGuests');
            $table->string('phone');
            $table->string('startTime');
            $table->string('suggestion');
            $table->unsignedInteger('status')->nullable();
            $table->unsignedInteger('initPayment')->nullable();
            $table->unsignedInteger('additionalPayment')->nullable();
            $table->string('isFullyPaid')->default('No');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
