<?php

namespace Database\Seeders;

use App\Models\Mail;
use Illuminate\Database\Seeder;

class MailsTableSeeder extends Seeder
{
    public function run(): void
    {
        Mail::create([
            'text' => 'ようこそ！我々のゲームをプレイしていただいてとても光栄です！こちらはささやかな贈り物です！HF:)',
            'item_id' => 2,
            'item_num' => 20,
        ]);

        Mail::create([
            'text' => '[お詫び]今イベントでの報酬が正しく配布されなかった補填として、
                        ユーザ様全員にこちらをお送りさせていただきます。ご不便おかけし申し訳ございません。',
            'item_id' => 3,
            'item_num' => 1,
        ]);

        Mail::create([
            'text' => 'あなたは今週のイベントで見事1位を獲得しました！おめでとうございます！こちらが今回の報酬となります！HF:)',
            'item_id' => 4,
            'item_num' => 5,
        ]);

        Mail::create([
            'text' => '[ストーリークリア報酬] *うまそうだ！',
            'item_id' => 1,
            'item_num' => 5,
        ]);
    }
}
