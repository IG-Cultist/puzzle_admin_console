<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('drop_stages', function (Blueprint $table) {
            $table->id();
            $table->integer("stage_id");
            $table->integer("item_id");
            $table->timestamps();

            $table->unique(['stage_id', 'item_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('drop_stages');
    }
};
