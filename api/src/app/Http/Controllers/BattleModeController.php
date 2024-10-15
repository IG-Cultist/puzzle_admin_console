<?php

namespace App\Http\Controllers;

use App\Http\Resources\BattleModeResource;
use App\Http\Resources\DeckResource;
use App\Http\Resources\ResultResource;
use App\Http\Resources\UsableCardResource;
use App\Models\BattleMode;
use App\Models\Deck;
use App\Models\Result;
use App\Models\UsableCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;

class BattleModeController extends Controller
{
    #バトルモード登録者一覧
    public function index(Request $request)
    {
        $user = BattleMode::All();
        return response()->json(BattleModeResource::collection($user));   #collectionで複数所得
    }

    public function usableCard()
    {
        $user = UsableCard::All();
        return response()->json(UsableCardResource::collection($user));   #collectionで複数所得
    }

    # ユーザID指定検索処理
    public function show(Request $request)
    {
        $user = BattleMode::where('user_id', '=', $request->user()->id)->get();
        return response()->json(BattleModeResource::collection($user));   #collectionで複数所得
    }

    #デッキ情報の検索処理
    public function deck_show(Request $request)
    {
        $deck = Deck::where('user_id', '=', $request->user()->id)->get();
        return response()->json(DeckResource::collection($deck));   #collectionで複数所得
    }

    #戦闘結果の検索処理
    public function result_show(Request $request)
    {
        $deck = Result::where('winner_id', '=', $request->user()->id)
            ->orWhere('loser_id', '=', $request->user()->id)->get();
        return response()->json(ResultResource::collection($deck));   #collectionで複数所得
    }

    #戦闘結果の更新
    public function result_update(Request $request)
    {
        try {
            //トランザクション処理
            $response = DB::transaction(function () use ($request) {
                $validator = Validator::make($request->all(), [
                    'judge' => ['required', 'int'],
                ]);
                if ($validator->fails()) {
                    return response()->json($validator->errors(), 400);
                }

                # リクエストされたユーザID指定で取得
                #$result = Result::where('winner_id', '=', $request->user()->id)
                #    ->where('loser_id', '=', $request->loser_id)->get();

                if ($request->judge == 1) { #1の場合プレイヤーの勝利
                    Result::create([
                        'winner_id' => $request->user()->id,
                        'loser_id' => $request->battle_user_id
                    ]);
                } elseif ($request->judge == 0) { #0の場合ユーザの敗北
                    Result::create([
                        'winner_id' => $request->battle_user_id,
                        'loser_id' => $request->user()->id
                    ]);
                } else {
                    return response()->json($validator->errors(), 400);
                }
            });
            if (isset($response)) {
                return $response;
            }
            return response()->json();
        } catch (Exception $e) {
            return response()->json($e, 500);
        }
    }

    #デッキ情報の更新
    public function deck_update(Request $request)
    {
        try {
            //トランザクション処理
            $response = DB::transaction(function () use ($request) {
                $validator = Validator::make($request->all(), [
                    'card_id' => ['required', 'int'],
                ]);
                if ($validator->fails()) {
                    return response()->json($validator->errors(), 400);
                }
                # DBに追加
                Deck::create([
                    'user_id' => $request->user()->id,
                    'card_id' => $request->card_id
                ]);
            });
            if (isset($response)) {
                return $response;
            }
            return response()->json();
        } catch (Exception $e) {
            return response()->json($e, 500);
        }
    }

    #デッキ情報の更新
    public function defense_deck_update(Request $request)
    {
        try {
            //トランザクション処理
            $response = DB::transaction(function () use ($request) {
                $validator = Validator::make($request->all(), [
                    'card_id' => ['required', 'int'],
                ]);
                if ($validator->fails()) {
                    return response()->json($validator->errors(), 400);
                }
                # DBに追加
                Defense_Deck::create([
                    'user_id' => $request->user()->id,
                    'card_id' => $request->card_id
                ]);
            });
            if (isset($response)) {
                return $response;
            }
            return response()->json();
        } catch (Exception $e) {
            return response()->json($e, 500);
        }
    }

    #デッキ情報の破棄
    public function deck_destroy(Request $request)
    {
        try {
            //トランザクション処理
            $response = DB::transaction(function () use ($request) {
                $validator = Validator::make($request->all(), [
                    'card_id' => ['required', 'int'],
                ]);
                if ($validator->fails()) {
                    return response()->json($validator->errors(), 400);
                }

                # リクエストされたユーザID指定で取得
                $deck = Deck::where('user_id', '=', $request->user()->id)
                    ->where('card_id', '=', $request->card_id)->get();

                if (count($deck) !== 0) { #指定情報があった場合
                    $deck[0]->delete(); #指定カラムを削除
                } else { #存在していなかった場合、処理しない
                    return response()->json($validator->errors(), 400);
                }
            });
            if (isset($response)) {
                return $response;
            }
            return response()->json();
        } catch (Exception $e) {
            return response()->json($e, 500);
        }
    }
}
