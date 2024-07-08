<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserItemResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserItemController extends Controller
{
    public function index()
    {

    }

    public function show(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $items = $user->items;
        $responce['items']
            = UserItemResource::collection($items);
        return response()->json($responce);
    }
}
