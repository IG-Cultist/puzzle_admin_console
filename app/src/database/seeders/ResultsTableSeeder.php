<?php

namespace Database\Seeders;

use App\Models\Result;
use Illuminate\Database\Seeder;

class ResultsTableSeeder extends Seeder
{
    public function run(): void
    {
        Result::create([
            'winner_id' => 15,
            'loser_id' => 1,
        ]);

        Result::create([
            'winner_id' => 95,
            'loser_id' => 26,
        ]);

        Result::create([
            'winner_id' => 61,
            'loser_id' => 27,
        ]);

        Result::create([
            'winner_id' => 7,
            'loser_id' => 41,
        ]);

        Result::create([
            'winner_id' => 1,
            'loser_id' => 3,
        ]);
    }
}
