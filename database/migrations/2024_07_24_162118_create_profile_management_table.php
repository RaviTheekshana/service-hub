<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileManagementTable extends Migration
{
    public function up(): void
    {
        Schema::create('profile__management', function (Blueprint $table) {
            $table->id();
            $table->integer('service_provider_id');
            $table->integer('experience_years');
            $table->double('hourly_rate');
            $table->string('certificate_path')->nullable();
            $table->longText('personal_summary');
            $table->longText('work_experience');
            $table->foreignId('category_id')->constrained('categories');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profile__management');
    }
}
