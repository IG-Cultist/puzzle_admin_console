<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    #アカウント一覧を表示
    public function index(Request $request)
    {
        if (!$request->session()->exists('login')) {
            return redirect('/');
        }
        $accounts = Account::All();
        return view('accounts/index', ['accounts' => $accounts]);
    }

    public function show(Request $request)
    {
        if (!$request->session()->exists('login')) {
            return redirect('/');
        }
        $accounts = Account::where('name', '=', $request['search'])->get();
        return view('accounts/index', ['accounts' => $accounts]);
    }
}
