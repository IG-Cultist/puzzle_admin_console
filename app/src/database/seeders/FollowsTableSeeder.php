<?php

namespace Database\Seeders;

use App\Models\Follow;
use Illuminate\Database\Seeder;

class FollowsTableSeeder extends Seeder
{
    public function run(): void
    {
        Follow::factory(500)->create();
    }
}
