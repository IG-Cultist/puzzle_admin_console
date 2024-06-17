<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ItemController extends Controller{
    #アカウント一覧を表示
    public function index(Request $request){
        if(!$request->session()->exists('login')){
            redirect('accounts/login');
        }
        $data=[[
            'id' => '1',
            'name' => 'ほしにく',
            'type' => '消耗品',
            'effect' => '20',
            'explain' => '使うとなくなる。丁寧に干された肉。20回復'

        ],[
            'id' => '2',
            'name' => '回復ポーション',
            'type' => '消耗品',
            'effect' => '100',
            'explain' => '使うとなくなる。赤く輝く回復薬。100回復'
        ],[
            'id' => '3',
            'name' => 'チタンバックル',
            'type' => '装備品',
            'effect' => '15',
            'explain' => 'ダメージを受ける毎、15の固定ダメージ軽減'
        ],[
            'id' => '4',
            'name' => 'モルテンナックル',
            'type' => '装備品',
            'effect' => '70',
            'explain' => 'ダメージを与える際、必ず値が70に固定される'
        ]];
        return view('accounts/item',['accounts' => $data]);
    }
}
