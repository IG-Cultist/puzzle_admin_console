<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('battle_modes', function (Blueprint $table) {
            $table->string('name')->after('user_id');     #ディスプレイネーム
            $table->string('icon_name')->after('name');      #アイコン名
        });
    }

    public function down(): void
    {
        Schema::table('', function (Blueprint $table) {
            $table->dropColumn('name');     #ディスプレイネーム
            $table->dropColumn('icon_name');     #アイコン名
        });
    }
};
