<?php

namespace App\Http\Controllers;

use App\Models\PlayerItem;
use Illuminate\Http\Request;

class PlayerItemController extends Controller
{
    #プレイヤー一覧を表示
    public function index(Request $request)
    {
        if (!$request->session()->exists('login')) {
            return redirect('/');
        }
        $data = PlayerItem::select('player_items.id', 'players.name as player_name', 'items.name as item_name',
            'item_num')
            ->join('players', 'player_items.player_id', '=', 'players.id')
            ->join('items', 'player_items.item_id', '=', 'items.id')->get();

        return view('accounts/playerItem', ['accounts' => $data]);
    }

    public function show(Request $request)
    {
        if (!$request->session()->exists('login')) {
            return redirect('/');
        }
        $accounts = PlayerItem::select('player_items.id', 'players.name as player_name', 'items.name as item_name',
            'item_num')
            ->where('player_items.id', '=', $request['search'])->join('players', 'player_items.player_id', '=',
                'players.id')
            ->join('items', 'player_items.item_id', '=', 'items.id')->get();
        return view('accounts/playerItem', ['accounts' => $accounts]);
    }
}
