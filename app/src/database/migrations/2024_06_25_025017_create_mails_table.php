<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('mails', function (Blueprint $table) {
            $table->id();
            $table->string('text', 255);           //メール内容
            $table->integer('item_id');     //アイテムid(アイテム名指定用)
            $table->integer('item_num');    //アイテム配布個数
            $table->timestamps();

            $table->unique('text');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mails');
    }
};
