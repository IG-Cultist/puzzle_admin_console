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
        Schema::create('player_items', function (Blueprint $table) {
            $table->id();
            $table->integer('player_id');   //プレイヤーid(プレイヤー名指定用)
            $table->integer('item_id');     //アイテムid(アイテム名指定用)
            $table->integer('item_num');    //所有アイテム個数
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_items');
    }
};
