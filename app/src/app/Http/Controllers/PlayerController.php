<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    #プレイヤー一覧を表示
    public function index(Request $request)
    {
        if (!$request->session()->exists('login')) {
            return redirect('/');
        }
        $data = Player::All();
        return view('accounts/player', ['accounts' => $data]);
    }
}
