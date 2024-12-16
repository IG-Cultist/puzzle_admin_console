<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('battle_modes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');     #ユーザID
            $table->string('name');     #ディスプレイネーム
            $table->string('icon_name');     #アイコン名
            $table->integer('match_num');   #戦闘数
            $table->text('last_match_at');  #最終戦闘日時
            $table->integer('point');  #ポイント
            $table->timestamps();

            $table->unique('user_id');
            $table->index('point');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('battle_modes');
    }
};
