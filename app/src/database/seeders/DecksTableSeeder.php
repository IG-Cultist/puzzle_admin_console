<?php

namespace Database\Seeders;

use App\Models\Deck;
use Illuminate\Database\Seeder;

class DecksTableSeeder extends Seeder
{
    public function run(): void
    {
        Deck::create([
            'user_id' => 3,
            'card_id' => 1,
        ]);

        Deck::create([
            'user_id' => 3,
            'card_id' => 3,
        ]);

        Deck::create([
            'user_id' => 3,
            'card_id' => 2,
        ]);

        Deck::create([
            'user_id' => 3,
            'card_id' => 1,
        ]);

        Deck::create([
            'user_id' => 42,
            'card_id' => 4,
        ]);

        Deck::create([
            'user_id' => 42,
            'card_id' => 5,
        ]);
    }
}
