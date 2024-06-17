<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('accounts/login');
    }

    public function dologin(Request $request){
        $error = 'ユーザ名またはパスワードに誤りがあります';
        if($request['name'] === 'jobi' and $request['password'] === 'jobi'){
            $request->session()->put('login',true);
            return redirect('accounts/home');
        }else{
            return view('accounts/login',['error'=> $error]);
        }
    }

    public function dologout(Request $request){
        $request->session()->forget('login');
        return view('accounts/login');
    }
}
