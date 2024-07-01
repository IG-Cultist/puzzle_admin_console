<?php

namespace App\Http\Controllers;

use App\Models\Receiver;
use Illuminate\Http\Request;

class ReceiverController extends Controller
{
    #========================
    # メール受信者一覧画面
    #========================
    public function index(Request $request)
    {
        if (!$request->session()->exists('login')) {
            return redirect()->route('login');
        }
        // 必要なカラムを取得
        $data = Receiver::select('receivers.id', 'users.name as user_name', 'mails.text as mail_txt',
            'items.name as item_name', 'mails.item_sum', 'receivers.isOpen')
            ->join('users', 'receivers.user_id', '=', 'users.id')
            ->join('mails', 'receivers.mail_id', '=', 'mails.id')
            ->join('items', 'mails.item_id', '=', 'items.id')
            ->get();
        return view('accounts.receiver', ['accounts' => $data]);
    }
}
