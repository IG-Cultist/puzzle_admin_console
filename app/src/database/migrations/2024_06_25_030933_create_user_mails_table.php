<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user_mails', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id'); //ユーザID(name取得用)
            $table->integer('mail_id'); //メールID(text取得用)
            $table->boolean('isOpen');  //確認済み判定
            $table->timestamps();

            $table->index(['user_id', 'mail_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_mails');
    }
};
