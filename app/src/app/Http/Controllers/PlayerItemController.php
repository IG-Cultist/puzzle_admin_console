<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PlayerItemController extends Controller{
    #プレイヤー一覧を表示
    public function index(Request $request){
        if(!$request->session()->exists('login')){
            redirect('accounts/login');
        }
        $data=[[
            'id' => '1',
            'player_name' => 'I.G.C',
            'item_name' => '回復ポーション',
            'item_num' => '999',

        ],[
            'id' => '2',
            'player_name' => 'Beginner',
            'item_name' => 'チタンバックル',
            'item_num' => '1',
        ],[
            'id' => '3',
            'player_name' => 'CacoDemon',
            'item_name' => 'ほしにく',
            'item_num' => '14',
        ]];
        return view('accounts/playerItem',['accounts' => $data]);
    }
}
