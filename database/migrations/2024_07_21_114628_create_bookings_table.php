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
            $table->foreignId('service_provider_id')->constrained('users');
            $table->string('address');
            $table->string('city');
            $table->string('phone');
            $table->boolean('status')->default(false);
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
