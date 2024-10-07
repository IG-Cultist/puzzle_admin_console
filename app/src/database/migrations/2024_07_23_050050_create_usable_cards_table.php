<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('usable_cards', function (Blueprint $table) {
            $table->id();
            $table->string('name');     #名称
            $table->integer('stack');   #枚数
            $table->timestamps();

            $table->unique('name');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usable_cards');
    }
};
