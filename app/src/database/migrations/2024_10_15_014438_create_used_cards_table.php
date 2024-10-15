<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('used_cards', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id'); #ユーザID
            $table->integer('card_id'); #カードID
            $table->integer('stack');   #使用枚数
            $table->timestamps();

            $table->index(['user_id', 'card_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('used_cards');
    }
};
