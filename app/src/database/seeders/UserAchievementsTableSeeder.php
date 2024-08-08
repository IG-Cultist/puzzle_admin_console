<?php

namespace Database\Seeders;

use App\Models\UserAchievement;
use Illuminate\Database\Seeder;

class UserAchievementsTableSeeder extends Seeder
{
    public function run(): void
    {
        UserAchievement::create([
            "user_id" => 1,
            "achievement_id" => 2,
            "progress" => 1
        ]);

        UserAchievement::create([
            "user_id" => 4,
            "achievement_id" => 3,
            "progress" => 24,
        ]);

        UserAchievement::create([
            "user_id" => 31,
            "achievement_id" => 1,
            "progress" => 1,
        ]);

        UserAchievement::create([
            "user_id" => 63,
            "achievement_id" => 1,
            "progress" => 50,
        ]);
    }
}
