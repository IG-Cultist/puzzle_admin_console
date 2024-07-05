<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');     //ユーザID
            $table->integer('follow_id');   //フォロー先ユーザID
            $table->timestamps();


            $table->index('user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('follows');
    }
};
