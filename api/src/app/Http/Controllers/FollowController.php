<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FollowController extends Controller
{
    public function index()
    {

    }

    public function show(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $follows = $user->follows->count();
        $followers = $user->followers->count();
        $social = $user->social;

        $responce['follows'] = $follows;
        $responce['followers'] = $followers;
        $responce['locate'] = $social->locate;
        $responce['last_login'] = $social->last_login;
        return response()->json($responce);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'int'],
            'follow_id' => ['required', 'int'],
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $follow = Follow::where('user_id', '=', $request->user_id)
            ->where('follow_id', '=', $request->follow_id)->get();

        if (count($follow) === 0) { #まだフォローしていない場合
            Follow::create([
                'user_id' => $request->user_id,
                'follow_id' => $request->follow_id,
            ]);
        } else { #すでにフォローしていた場合
            return response()->json($validator->errors(), 400);
        }
        return response()->json();
    }

    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'int'],
            'follow_id' => ['required', 'int'],
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $follow = Follow::where('user_id', '=', $request->user_id)
            ->where('follow_id', '=', $request->follow_id)->get();

        if (count($follow) !== 0) { #フォローしていた場合
            $follow[0]->delete(); #指定カラムを削除
        } else { #フォローしていなかった場合
            return response()->json($validator->errors(), 400);
        }
        return response()->json();
    }
}
