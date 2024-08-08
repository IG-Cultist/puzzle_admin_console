<?php

namespace App\Http\Controllers;

use App\Http\Resources\BattleModeResource;
use App\Http\Resources\DeckResource;
use App\Models\BattleMode;
use App\Models\Deck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;

class BattleModeController extends Controller
{
    public function index()
    {

    }

    # ユーザID指定検索処理
    public function show(Request $request)
    {
        $user = BattleMode::where('user_id', '=', $request->user_id)->get();
        return response()->json(BattleModeResource::collection($user));   #collectionで複数所得
    }

    public function deck_show(Request $request)
    {
        $deck = Deck::where('user_id', '=', $request->user_id)->get();
        return response()->json(DeckResource::collection($deck));   #collectionで複数所得
    }

    public function deck_update(Request $request)
    {
        try {
            //トランザクション処理
            DB::transaction(function () use ($request) {
                $validator = Validator::make($request->all(), [
                    'user_id' => ['required', 'int'],
                    'card_id' => ['required', 'int'],
                ]);
                if ($validator->fails()) {
                    return response()->json($validator->errors(), 400);
                }

                # リクエストされたユーザID指定で取得
                $deck = Deck::where('user_id', '=', $request->user_id)
                    ->where('card_id', '=', $request->card_id)->get();

                if (count($deck) !== 0) { #すでに設定している場合、処理をしない
                    return response()->json($validator->errors(), 400);
                } else { #新しく設定した場合
                    # DBに追加
                    Deck::create([
                        'user_id' => $request->user_id,
                        'card_id' => $request->card_id
                    ]);
                }
            });
            return response()->json();
        } catch (Exception $e) {
            return response()->json($e, 500);
        }
    }

    public function deck_destroy(Request $request)
    {
        try {
            //トランザクション処理
            DB::transaction(function () use ($request) {
                $validator = Validator::make($request->all(), [
                    'user_id' => ['required', 'int'],
                    'card_id' => ['required', 'int'],
                ]);
                if ($validator->fails()) {
                    return response()->json($validator->errors(), 400);
                }

                # リクエストされたユーザID指定で取得
                $deck = Deck::where('user_id', '=', $request->user_id)
                    ->where('card_id', '=', $request->card_id)->get();

                if (count($deck) !== 0) { #指定情報があった場合
                    $deck[0]->delete(); #指定カラムを削除
                } else { #存在していなかった場合、処理しない
                    return response()->json($validator->errors(), 400);
                }
            });
            return response()->json();
        } catch (Exception $e) {
            return response()->json($e, 500);
        }
    }
}
