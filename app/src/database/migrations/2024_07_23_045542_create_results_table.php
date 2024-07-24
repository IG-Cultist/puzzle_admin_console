<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->integer('winner_id');   #勝利ユーザID
            $table->integer('loser_id');    #敗北ユーザID
            $table->timestamps();

            $table->index(['winner_id', 'loser_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
