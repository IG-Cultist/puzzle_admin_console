<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::create([
            'name' => 'Spike',
            'effect' => 1,
            'bestItem_name' => 'Shield',
            'explain' => '攻撃力+1',
        ]);

        Item::create([
            'name' => 'ArmorChip',
            'effect' => 1,
            'bestItem_name' => '',
            'explain' => '付与シールド+1',
        ]);

        Item::create([
            'name' => 'Slime',
            'effect' => 1,
            'bestItem_name' => '',
            'explain' => '攻撃時、敵の攻撃力-1',
        ]);

        Item::create([
            'name' => 'Hone',
            'effect' => 0,
            'bestItem_name' => 'Sword',
            'explain' => '(Swordのみ影響)盾を無視して攻撃できる',
        ]);

        Item::create([
            'name' => 'CleanStone',
            'effect' => 0,
            'bestItem_name' => '',
            'explain' => '効果なし。無駄にきれい',
        ]);

        Item::create([
            'name' => 'WonderfulReplica',
            'effect' => 0,
            'bestItem_name' => '',
            'explain' => '効果なし。無駄に出来がいい',
        ]);

        Item::create([
            'name' => 'HandGun',
            'effect' => 0,
            'bestItem_name' => '',
            'explain' => '効果なし。弾切れだ',
        ]);
    }
}
