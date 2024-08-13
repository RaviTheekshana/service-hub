<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChatIdToMessagesTable extends Migration
{
    public function up(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->foreignId('chat_id')->constrained('chats');
        });
    }

    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            //
        });
    }
}
