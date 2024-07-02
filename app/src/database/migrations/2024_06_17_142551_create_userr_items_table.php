<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_items', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');     //ユーザid(ユーザ名指定用)
            $table->integer('item_id');     //アイテムid(アイテム名指定用)
            $table->integer('item_num');    //所有アイテム個数
            $table->timestamps();

            $table->unique(['user_id', 'item_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_items');
    }
};
