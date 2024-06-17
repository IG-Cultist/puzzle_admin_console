<?php
namespace App\Http\Controllers;

class HomeController extends Controller{
    #アカウント一覧を表示
    public function index(){
        return view('accounts/home');
    }
}
