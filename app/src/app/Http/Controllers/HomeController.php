<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    #アカウント一覧を表示
    public function index(Request $request)
    {
        if (!$request->session()->exists('login')) {
            return redirect('/');
        }
        return view('accounts.home');
    }
}
