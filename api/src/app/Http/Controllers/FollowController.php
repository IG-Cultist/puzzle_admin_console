<?php

namespace App\Http\Controllers;

use App\Http\Resources\FollowResource;
use App\Models\Social;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function index()
    {

    }

    public function show(Request $request)
    {
        $user = Social::findOrFail($request->user_id);
        $follows = $user->follows;
        $responce['follows']
            = FollowResource::collection($follows);
        return response()->json($responce);
    }
}
