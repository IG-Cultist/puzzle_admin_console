<?php

namespace Database\Seeders;

use App\Models\BattleMode;
use Illuminate\Database\Seeder;

class BattleModesTableSeeder extends Seeder
{
    public function run(): void
    {
        BattleMode::create([
            'user_id' => 1,
            'match_num' => 5,
            'last_match_at' => '2024/07/23 10:15:03',
            'point' => 125,
        ]);

        BattleMode::create([
            'user_id' => 15,
            'match_num' => 4,
            'last_match_at' => '2024/07/24 21:09:14',
            'point' => 10020,
        ]);

        BattleMode::create([
            'user_id' => 34,
            'match_num' => 3,
            'last_match_at' => '2024/07/22 23:59:50',
            'point' => 20,
        ]);

        BattleMode::create([
            'user_id' => 3,
            'match_num' => 1,
            'last_match_at' => '2024/01/12 08:45:23',
            'point' => 10,
        ]);

        BattleMode::create([
            'user_id' => 84,
            'match_num' => 5,
            'last_match_at' => '2024/07/24 20:19:54',
            'point' => 350,
        ]);
    }
}
