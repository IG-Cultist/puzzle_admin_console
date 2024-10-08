<?php

namespace Database\Seeders;

use App\Models\UsableCard;
use Illuminate\Database\Seeder;

class UsableCardsTableSeeder extends Seeder
{
    public function run(): void
    {
        UsableCard::create([
            'name' => "Sword",
            'type' => 'Attack',
            'stack' => 4
        ]);

        UsableCard::create([
            'name' => "Shield",
            'type' => 'Defence',
            'stack' => 4,
        ]);

        UsableCard::create([
            'name' => "SwatShield",
            'type' => 'Defence',
            'stack' => 2,
        ]);

        UsableCard::create([
            'name' => "A.X.E",
            'type' => 'Attack',
            'stack' => 2,
        ]);

        UsableCard::create([
            'name' => "S.Y.T.H",
            'type' => 'Attack',
            'stack' => 2,
        ]);

        UsableCard::create([
            'name' => "Injector",
            'type' => 'Attack',
            'stack' => 1,
        ]);

        UsableCard::create([
            'name' => "ForgeHammer",
            'type' => 'Attack',
            'stack' => 1,
        ]);

        UsableCard::create([
            'name' => "M.A.C.E",
            'type' => 'Attack',
            'stack' => 2,
        ]);

        UsableCard::create([
            'name' => "PoisonKnife",
            'type' => 'Attack',
            'stack' => 2,
        ]);
    }
}
