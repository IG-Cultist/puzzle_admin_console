<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->session()->exists('login')) {
            return redirect()->route('login');
        }
        //$data = Social::paginate(10);
        $data = Social::select('socials.id', 'users.name as user_name', 'socials.follow',
            'socials.follower', 'socials.locate', 'socials.last_login')
            ->join('users', 'socials.user_id', '=', 'users.id')
            ->get();
        return view('socials.social', ['items' => $data]);
    }

    public function show(Request $request)
    {
        if (!$request->session()->exists('login')) {
            return redirect()->route('login');
        }

        $data = Social::select('socials.id', 'users.name as user_name', 'socials.follow',
            'socials.follower', 'socials.locate', 'socials.last_login')
            ->join('users', 'socials.user_id', '=', 'users.id')
            ->where('user_id', '=', $request['search'])->get();
        return view('socials.social', ['items' => $data]);
    }
}
