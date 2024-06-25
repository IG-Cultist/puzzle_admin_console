<?php

namespace Database\Seeders;

use App\Models\Receiver;
use Illuminate\Database\Seeder;

class ReceiversTableSeeder extends Seeder
{
    public function run(): void
    {
        Receiver::create([
            'user_id' => 1,
            'mail_id' => 4,
            'isOpen' => false,
        ]);

        Receiver::create([
            'user_id' => 2,
            'mail_id' => 3,
            'isOpen' => true,
        ]);

        Receiver::create([
            'user_id' => 3,
            'mail_id' => 2,
            'isOpen' => true,
        ]);

        Receiver::create([
            'user_id' => 4,
            'mail_id' => 1,
            'isOpen' => true,
        ]);
    }
}
