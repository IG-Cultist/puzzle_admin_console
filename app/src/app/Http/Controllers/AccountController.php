<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AccountController extends Controller{
    #アカウント一覧を表示
    public function index(Request $request){
        if(!$request->session()->exists('login')){
            redirect('accounts/login');
        }
        $title ='アカウント一覧';
        $data=[[
            'name' => 'IGC',
            'password' => '3$fsd$fa3#'
            ],[
            'name' => '<h1>jobi</h1>',
            'password' => '$qdh$w#qjt'
        ]];
        return view('accounts/index',['title' => $title,'accounts' => $data]);
    }
}
