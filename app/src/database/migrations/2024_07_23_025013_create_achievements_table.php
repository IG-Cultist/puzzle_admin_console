<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('name');       #実績名
            $table->string('conditions'); #解放条件
            $table->string('rarelity');  #レアリティ
            $table->timestamps();

            $table->unique('name');
            $table->index('rarelity');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
