<?php

namespace Database\Seeders;

use App\Models\Stage;
use Illuminate\Database\Seeder;

class StagesTableSeeder extends Seeder
{
    public function run(): void
    {
        Stage::create([
            'isClear' => true,
        ]);

        Stage::create([
            'isClear' => true,
        ]);

        Stage::create([
            'isClear' => false,
        ]);

        Stage::create([
            'isClear' => false,
        ]);

    }
}
