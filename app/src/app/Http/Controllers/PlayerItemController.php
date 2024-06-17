<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\PlayerItem;
use Illuminate\Http\Request;

class PlayerItemController extends Controller
{
    #プレイヤー一覧を表示
    public function index(Request $request)
    {
        if (!$request->session()->exists('login')) {
            redirect('/');
        }
        $data = PlayerItem::All();
        return view('accounts/playerItem', ['accounts' => $data]);
    }
}
