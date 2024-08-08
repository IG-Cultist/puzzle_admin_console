<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemResource;
use App\Http\Resources\StageResource;
use App\Http\Resources\UserItemResource;
use App\Models\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;

class StageController extends Controller
{
    public function index()
    {
        $stage = Stage::All();
        return response()->json(StageResource::collection($stage));   #collectionで複数所得
    }

    public function update(Request $request)
    {
        try {
            //トランザクション処理
            DB::transaction(function () use ($request) {
                $validator = Validator::make($request->all(), [
                    'id' => ['required', 'int'],
                ]);
                if ($validator->fails()) {
                    return response()->json($validator->errors(), 400);
                }

                //指定したIDでステージを検索
                $stage = Stage::where('id', '=', $request->id)->get();

                //クリアしていなかった場合、クリアにする
                if ($stage[0]['isClear'] === 0) {
                    $stage[0]->update(['isClear' => 1]);
                } else { //クリアしていた場合、エラーを返す
                    return response()->json($validator->errors(), 400);
                }
            });
            return response()->json();
        } catch (Exception $e) {
            return response()->json($e, 500);
        }
    }
}
