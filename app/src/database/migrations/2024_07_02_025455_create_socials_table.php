<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('socials', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');           //ユーザID
            $table->integer('follow');            //フォロー数
            $table->integer('follower');          //フォロワー数
            $table->string('locate', 20);   //所在地
            $table->text('last_login');     //最終ログイン日時
            $table->timestamps();

            $table->unique('user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('socials');
    }
};
