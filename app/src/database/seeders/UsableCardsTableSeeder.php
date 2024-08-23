<?php

namespace Database\Seeders;

use App\Models\UsableCard;
use Illuminate\Database\Seeder;

class UsableCardsTableSeeder extends Seeder
{
    public function run(): void
    {
        UsableCard::create([
            'name' => "剣",
            'effect' => 1,
            'explain' => "基本の武器",
        ]);

        UsableCard::create([
            'name' => "盾",
            'effect' => 1,
            'explain' => "基本の盾",
        ]);

        UsableCard::create([
            'name' => "バトルアックス",
            'effect' => 1,
            'explain' => "ブロックを無視できるパワフルな武器",
        ]);

        UsableCard::create([
            'name' => "スパイクシールド",
            'effect' => 1,
            'explain' => "とげとげしいワイルドな盾",
        ]);
    }
}
