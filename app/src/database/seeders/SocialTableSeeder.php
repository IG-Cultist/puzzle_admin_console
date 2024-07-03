<?php

namespace Database\Seeders;

use App\Models\Social;
use Illuminate\Database\Seeder;

class SocialTableSeeder extends Seeder
{
    public function run(): void
    {
        Social::create([
            'user_id' => 1,
            'follow' => 15,
            'follower' => 7,
            'locate' => '京都',
            'last_login' => '2024/06/11',
        ]);

        Social::create([
            'user_id' => 25,
            'follow' => 38,
            'follower' => 14,
            'locate' => 'アメリカ',
            'last_login' => '2012/09/14',
        ]);

        Social::create([
            'user_id' => 8,
            'follow' => 0,
            'follower' => 1,
            'locate' => '山梨',
            'last_login' => '2022/02/21',
        ]);

        Social::create([
            'user_id' => 71,
            'follow' => 140,
            'follower' => 68,
            'locate' => '北海道',
            'last_login' => '2024/07/02',
        ]);

        Social::create([
            'user_id' => 47,
            'follow' => 8,
            'follower' => 8,
            'locate' => '青森',
            'last_login' => '2024/07/01',
        ]);
    }
}
