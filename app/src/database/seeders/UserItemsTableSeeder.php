<?php

namespace Database\Seeders;

use App\Models\UserItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserItem::create([
            'user_id' => 1,
            'item_id' => 2,
            'item_num' => 99,
        ]);

        UserItem::create([
            'user_id' => 3,
            'item_id' => 1,
            'item_num' => 4,
        ]);

        UserItem::create([
            'user_id' => 3,
            'item_id' => 4,
            'item_num' => 1,
        ]);
    }
}
