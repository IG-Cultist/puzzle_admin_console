<?php

namespace App\Http\Controllers;

use App\Http\Resources\DropStageResource;
use App\Http\Resources\ItemResource;
use App\Http\Resources\UsableStageResource;
use App\Models\DropStage;
use App\Models\Item;
use App\Models\UsableStage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    #アイテム一覧
    public function index(Request $request)
    {
        $user = Item::All();
        return response()->json(ItemResource::collection($user));   #collectionで複数所得
    }

    #ドロップステージ一覧
    public function drop(Request $request)
    {
        $user = DropStage::All();
        return response()->json(DropStageResource::collection($user));   #collectionで複数所得
    }

    #使用可能ステージ一覧
    public function usable(Request $request)
    {
        $user = UsableStage::All();
        return response()->json(UsableStageResource::collection($user));   #collectionで複数所得
    }
}
