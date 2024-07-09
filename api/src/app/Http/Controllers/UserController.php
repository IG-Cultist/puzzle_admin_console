<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'min' => ['required', 'int'],
            'max' => ['required', 'int'],
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::where('level', '>=', $request->min)
            ->where('level', '<=', $request->max)->get();
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
            'level' => 1,
            'exp' => 0,
            'life' => 10
        ]);

        return response()->json(['user_id' => $user->id]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'int'],
            'name' => ['string'],
            'level' => ['int'],
            'exp' => ['int'],
            'life' => ['int'],
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::findOrFail($request->user_id);
        if (isset($request->name)) { #nameがリクエストにあった場合
            $user['name'] = $request->name;
        }
        if (isset($request->level)) { #levelがリクエストにあった場合
            $user['level'] = $request->level;
        }
        if (isset($request->exp)) { #expがリクエストにあった場合
            $user['exp'] = $request->exp;
        }
        if (isset($request->life)) { #lifeがリクエストにあった場合
            $user['life'] = $request->life;
        }
        $user->save();

        return response()->json();
    }
}
