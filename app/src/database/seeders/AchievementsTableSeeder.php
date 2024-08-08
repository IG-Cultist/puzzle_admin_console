<?php

namespace Database\Seeders;

use App\Models\Achievement;
use Illuminate\Database\Seeder;

class AchievementsTableSeeder extends Seeder
{
    public function run(): void
    {
        Achievement::create([
            'name' => 'Oops!',
            'conditions' => '自分の一手で死ぬ',
            'rarelity' => 'common',
            'request_progress' => 1,
        ]);

        Achievement::create([
            'name' => 'おいしい!',
            'conditions' => 'ポーションでダメージを受ける',
            'rarelity' => 'common',
            'request_progress' => 1,
        ]);

        Achievement::create([
            'name' => '最善手',
            'conditions' => 'もっとも最適な行動でクリアする',
            'rarelity' => 'rare',
            'request_progress' => 1,
        ]);

        Achievement::create([
            'name' => '制覇',
            'conditions' => '全キャンペーンステージをクリアする',
            'rarelity' => 'Unique',
            'request_progress' => 50,
        ]);

        Achievement::create([
            'name' => '完全制覇',
            'conditions' => '全キャンペーンステージを完璧にクリアする',
            'rarelity' => 'Ultimate',
            'request_progress' => 50,
        ]);
    }
}
