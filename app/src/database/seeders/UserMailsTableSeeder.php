<?php

namespace Database\Seeders;

use App\Models\UserMail;
use Illuminate\Database\Seeder;

class UserMailsTableSeeder extends Seeder
{
    public function run(): void
    {
        UserMail::create([
            'user_id' => 1,
            'mail_id' => 4,
            'isOpen' => false,
        ]);

        UserMail::create([
            'user_id' => 2,
            'mail_id' => 3,
            'isOpen' => true,
        ]);

        UserMail::create([
            'user_id' => 3,
            'mail_id' => 2,
            'isOpen' => true,
        ]);

        UserMail::create([
            'user_id' => 4,
            'mail_id' => 1,
            'isOpen' => true,
        ]);
    }
}
