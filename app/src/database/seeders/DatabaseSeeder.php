<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AccountsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(UserItemsTableSeeder::class);
        $this->call(MailsTableSeeder::class);
        $this->call(SocialTableSeeder::class);
        $this->call(UserMailsTableSeeder::class);
        $this->call(FollowsTableSeeder::class);
        $this->call(AchievementsTableSeeder::class);
        $this->call(UsreAchievementsTableSeeder::class);
        $this->call(ResultsTableSeeder::class);
        $this->call(BattleModesTableSeeder::class);
        $this->call(DropStagesTableSeeder::class);
        $this->call(UsableCardsTableSeeder::class);
        $this->call(UsableStagesTableSeeder::class);
        $this->call(StagesTableSeeder::class);
    }
}
