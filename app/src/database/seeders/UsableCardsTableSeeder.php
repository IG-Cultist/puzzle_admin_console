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
            'stack' => 4,
        ]);

        UsableCard::create([
            'name' => "Shield",
            'stack' => 4,
        ]);

        UsableCard::create([
            'name' => "A.X.E",
            'stack' => 2,
        ]);

        UsableCard::create([
            'name' => "S.Y.T.H",
            'stack' => 2,
        ]);

        UsableCard::create([
            'name' => "Injector",
            'stack' => 1,
        ]);

        UsableCard::create([
            'name' => "SwatShield",
            'stack' => 2,
        ]);

        UsableCard::create([
            'name' => "ForgeHammer",
            'stack' => 1,
        ]);

        UsableCard::create([
            'name' => "M.A.C.E",
            'stack' => 2,
        ]);

        UsableCard::create([
            'name' => "PoisonKnife",
            'stack' => 2,
        ]);
    }
}
