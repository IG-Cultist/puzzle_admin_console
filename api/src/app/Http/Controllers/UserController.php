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
}
