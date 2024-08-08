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
            'name' => 'ほしにく',
            'effect' => 20,
            'explain' => '使うとなくなる。丁寧に干された肉。小回復',
        ]);

        Item::create([
            'name' => '回復ポーション',
            'effect' => 100,
            'explain' => '使うとなくなる。赤く輝く回復薬。大回復',
        ]);

        Item::create([
            'name' => 'チタニウムバックル',
            'effect' => 15,
            'explain' => 'ダメージを受ける毎、固定ダメージ軽減',
        ]);

        Item::create([
            'name' => 'モルテンナックル',
            'effect' => 70,
            'explain' => 'ダメージを与える毎、必ず値が70に固定される',
        ]);
    }
}
