<?php

namespace Database\Seeders;

use App\Models\UsableStage;
use Illuminate\Database\Seeder;

class UsableStagesTableSeeder extends Seeder
{
    public function run(): void
    {
        UsableStage::create([
            'stage_id' => 1,
            'item_id' => 3,
        ]);

        UsableStage::create([
            'stage_id' => 1,
            'item_id' => 1,
        ]);

        UsableStage::create([
            'stage_id' => 2,
            'item_id' => 4,
        ]);
    }
}
