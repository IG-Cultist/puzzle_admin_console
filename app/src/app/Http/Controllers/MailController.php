<?php

namespace App\Http\Controllers;

use App\Models\Mail;
use App\Models\Receiver;
use App\Models\User;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index()
    {
        return view('accounts.send');
    }

    public function sendMail(Request $request)
    {
        //メールテーブルから入力したIDの情報を取得
        $isMailExist = Mail::where('id', '=', $request['mail_id'])->get();

        //ユーザテーブルから入力したIDの情報を取得
        $isUserExist = User::where('id', '=', $request['user_id'])->get();

        //そのIDのメールが存在しない場合、再入力
        if ($isMailExist->count() === 0) {
            return redirect()->route('create', ['error' => 'notMailExists']);
        }

        //そのIDのユーザが存在しない場合、再入力
        if ($isUserExist->count() === 0) {
            return redirect()->route('create', ['error' => 'notUserExists']);
        }

        //各情報をテーブルに挿入
        Receiver::create(['user_id' => $request['user_id'], 'mail_id' => $request['mail_id'], 'isOpen' => false]);

        //完了ページへリダイレクト
        return redirect()->route('accounts.send', ['send' => 'success']);
    }
}
