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
            'locate' => '京都',
            'last_login' => '2024/06/11',
        ]);

        Social::create([
            'user_id' => 25,
            'locate' => 'アメリカ',
            'last_login' => '2012/09/14',
        ]);

        Social::create([
            'user_id' => 8,
            'locate' => '山梨',
            'last_login' => '2022/02/21',
        ]);

        Social::create([
            'user_id' => 71,
            'locate' => '北海道',
            'last_login' => '2024/07/02',
        ]);

        Social::create([
            'user_id' => 47,
            'locate' => '青森',
            'last_login' => '2024/07/01',
        ]);
    }
}
