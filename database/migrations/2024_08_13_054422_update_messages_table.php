<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMessagesTable extends Migration
{
    public function up(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropColumn('sender_user_Id');
            $table->dropColumn('receiver_user_Id');

            $table->foreignId('sender_user_id')->constrained('users');
            $table->boolean('is_read')->default(false);
        });
    }

    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            //
        });
    }
}
