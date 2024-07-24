<?php

namespace Database\Seeders;

use App\Models\UserAchievement;
use Illuminate\Database\Seeder;

class UsreAchievementsTableSeeder extends Seeder
{
    public function run(): void
    {
        UserAchievement::create([
            "user_id" => 1,
            "achievement_id" => 2,
            "get_at" => '2024/06/11',
        ]);

        UserAchievement::create([
            "user_id" => 4,
            "achievement_id" => 3,
            "get_at" => '2024/12/08',
        ]);

        UserAchievement::create([
            "user_id" => 31,
            "achievement_id" => 1,
            "get_at" => '2022/05/15',
        ]);

        UserAchievement::create([
            "user_id" => 63,
            "achievement_id" => 1,
            "get_at" => '2024/08/21',
        ]);
    }
}
