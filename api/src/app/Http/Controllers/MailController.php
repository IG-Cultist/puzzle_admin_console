<?php

namespace App\Http\Controllers;

use App\Http\Resources\MailResource;
use App\Models\Mail;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
    public function index()
    {
        $user = Mail::All();
        return response()->json(MailResource::collection($user));   #collectionで複数所得
    }
}
