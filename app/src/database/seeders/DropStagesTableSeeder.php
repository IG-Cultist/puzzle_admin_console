<?php

namespace Database\Seeders;

use App\Models\DropStage;
use Illuminate\Database\Seeder;

class DropStagesTableSeeder extends Seeder
{
    public function run(): void
    {
        DropStage::create([
            'stage_id' => 1,
            'item_id' => 3,
        ]);

        DropStage::create([
            'stage_id' => 1,
            'item_id' => 1,
        ]);

        DropStage::create([
            'stage_id' => 1,
            'item_id' => 4,
        ]);

        DropStage::create([
            'stage_id' => 2,
            'item_id' => 1,
        ]);

        DropStage::create([
            'stage_id' => 3,
            'item_id' => 1,
        ]);

        DropStage::create([
            'stage_id' => 2,
            'item_id' => 4,
        ]);

    }
}
