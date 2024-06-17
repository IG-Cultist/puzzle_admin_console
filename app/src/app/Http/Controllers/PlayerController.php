<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PlayerController extends Controller{
    #プレイヤー一覧を表示
    public function index(Request $request){
        if(!$request->session()->exists('login')){
            return redirect('accounts/login');
        }
        $data=[[
            'id' => '1',
            'name' => 'I.G.C',
            'level' => '34',
            'exp' => '2400',
            'life' => '143'

        ],[
            'id' => '2',
            'name' => 'ダイアモンド不愉快',
            'level' => '47',
            'exp' => '3602',
            'life' => '175'
        ],[
            'id' => '3',
            'name' => 'CacoDemon',
            'level' => '61',
            'exp' => '6840',
            'life' => '241'
        ],[
            'id' => '4',
            'name' => 'Beginner',
            'level' => '5',
            'exp' => '70',
            'life' => '21'
        ]];
        return view('accounts/player',['accounts' => $data]);
    }
}
