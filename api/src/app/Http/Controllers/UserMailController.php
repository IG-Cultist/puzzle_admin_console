<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserMailResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserMailController extends Controller
{
    public function index()
    {

    }

    public function show(Request $request)
    {
        $user = User::findOrFail($request->mail_id);
        $mails = $user->mails;
        $responce['mails']
            = UserMailResource::collection($mails);
        return response()->json($responce);
    }
}
