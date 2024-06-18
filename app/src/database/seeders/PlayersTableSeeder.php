<?php

namespace Database\Seeders;

use App\Models\Player;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Player::create([
            'name' => 'I.G.C',
            'level' => '34',
            'exp' => 2400,
            'life' => 143,
        ]);

        Player::create([
            'name' => 'ダイアモンド不愉快',
            'level' => '47',
            'exp' => 3602,
            'life' => 175,
        ]);

        Player::create([
            'name' => 'CacoDemon',
            'level' => '61',
            'exp' => 6840,
            'life' => 241,
        ]);

        Player::create([
            'name' => 'Beginner',
            'level' => '5',
            'exp' => 70,
            'life' => 21,
        ]);
    }
}
