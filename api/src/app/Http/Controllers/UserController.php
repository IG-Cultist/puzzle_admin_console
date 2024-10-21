<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use http\Env\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = User::All();
        return response()->json(UserResource::collection($user));   #collectionで複数所得
    }

    public function show(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        return response()->json(UserResource::make($user));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $user = User::create([
            'name' => $request->name,
        ]);
        $token = $user->createToken($request->name)->plainTextToken;

        return response()->json(['user_id' => $user->id, 'token' => $token]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'int'],
            'name' => ['string'],
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::findOrFail($request->user()->id);
        if (isset($request->name)) { #nameがリクエストにあった場合
            $user['name'] = $request->name;
        }

        $user->save();
        return response()->json();
    }

    public function createToken(Request $request)
    {
        # トークンが保存されているか確認
        $token = PersonalAccessToken::where(
            'tokenable_id', '=', $request->user_id)->first();

        if ($token == null) {
            $user = User::findOrFail($request->user_id);
            # トークンを生成
            $token = $user->createToken($user->name)->plainTextToken;
            # ユーザIDとトークンを返す
            return response()->json(['user_id' => $user->id, 'token' => $token]);
        } else {
            return response()->json();
        }
    }
}
