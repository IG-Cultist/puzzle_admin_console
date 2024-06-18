<?php

namespace Database\Seeders;

use App\Models\PlayerItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayerItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PlayerItem::create([
            'player_id' => 1,
            'item_id' => 2,
            'item_num' => 99,
        ]);

        PlayerItem::create([
            'player_id' => 3,
            'item_id' => 1,
            'item_num' => 4,
        ]);

        PlayerItem::create([
            'player_id' => 3,
            'item_id' => 4,
            'item_num' => 1,
        ]);
    }
}
