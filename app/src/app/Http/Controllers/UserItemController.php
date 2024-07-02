<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserItemController extends Controller
{
    #プレイヤー一覧を表示
    public function index(Request $request)
    {
        if (!$request->session()->exists('login')) {
            return redirect()->route('login');
        }
        //$data = UserItem::select('user_items.id', 'users.name as user_name', 'items.name as item_name',
        //    'item_num')
        //    ->join('users', 'user_items.user_id', '=', 'users.id')
        //    ->join('items', 'user_items.item_id', '=', 'items.id')
        //    ->get();

        return view('accounts.userItem');
    }

    public function show(Request $request)
    {
        if (!$request->session()->exists('login')) {
            return redirect()->route('login');
        }

        $data = User::find($request->search);
        return view('accounts.userItem', ['user' => $data]);
    }
}
