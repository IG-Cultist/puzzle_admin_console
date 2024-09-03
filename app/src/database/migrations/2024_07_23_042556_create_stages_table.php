<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('stages', function (Blueprint $table) {
            $table->id();
            $table->integer('isClear');
            $table->integer('isPerfect');
            $table->timestamps();

            $table->index(['isClear', 'isPerfect']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stages');
    }
};
