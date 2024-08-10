<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->dateTime('service_date');
            $table->time('service_time');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('service_provider_id')->constrained('users');
            $table->string('address');
            $table->string('city');
            $table->string('phone');
            $table->string('phone_two');
            $table->string('email');
            $table->enum('status', ['Pending', 'Confirmed', 'Completed', 'Cancelled'])->default('Pending');
            $table->longText('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
