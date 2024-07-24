<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('usable_stages', function (Blueprint $table) {
            $table->id();
            $table->integer('item_id');  #アイテムID
            $table->integer('stage_id'); #ステージID
            $table->timestamps();

            $table->unique(['item_id', 'stage_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usable_stages');
    }
};
