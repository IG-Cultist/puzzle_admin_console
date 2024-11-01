<?php

namespace App\Http\Controllers;

use App\Http\Resources\BattleModeResource;
use App\Http\Resources\DeckResource;
use App\Http\Resources\DefenseDeckResource;
use App\Http\Resources\ResultResource;
use App\Http\Resources\UsableCardResource;
use App\Http\Resources\UsedCardResource;
use App\Models\BattleMode;
use App\Models\Deck;
use App\Models\DefenseDeck;
use App\Models\Result;
use App\Models\UsableCard;
use App\Models\UsedCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;

class BattleModeController extends Controller
{
    # ======================
    # バトルモードプロフィール一覧取得処理
    # ======================
    public function index(Request $request)
    {
        $user = BattleMode::All();
        return response()->json(BattleModeResource::collection($user));   #collectionで複数所得
    }

    # ======================
    # 使用可能カード一覧取得処理
    # ======================
    public function usableCard()
    {
        $user = UsableCard::All();
        return response()->json(UsableCardResource::collection($user));   #collectionで複数所得
    }

    # ======================
    # バトルモードプロフィール検索処理
    # ======================
    public function show(Request $request)
    {
        $user = BattleMode::where('user_id', '=', $request->user()->id)->get();
        return response()->json(BattleModeResource::collection($user));   #collectionで複数所得
    }

    # ======================
    # デッキ検索処理
    # ======================
    public function deck_show(Request $request)
    {
        $deck = Deck::where('user_id', '=', $request->user()->id)->get();
        return response()->json(DeckResource::collection($deck));   #collectionで複数所得
    }

    # ======================
    # リザルト検索処理
    # ======================
    public function result_show(Request $request)
    {
        $deck = Result::where('winner_id', '=', $request->user()->id)
            ->orWhere('loser_id', '=', $request->user()->id)->get();
        return response()->json(ResultResource::collection($deck));   #collectionで複数所得
    }

    # ======================
    # 防衛デッキ検索処理
    # ======================
    public function defenceDeck_show(Request $request)
    {
        $deck = DefenseDeck::where('user_id', '=', $request->user()->id)->get();
        return response()->json(DefenseDeckResource::collection($deck));   #collectionで複数所得
    }

    # ======================
    # 使用済みカード検索処理
    # ======================
    public function usedCard_show(Request $request)
    {
        $card = Deck::where('user_id', '=', $request->user()->id)->get();
        return response()->json(UsedCardResource::collection($card));   #collectionで複数所得
    }

    # ======================
    # リザルト&使用済みカード更新処理
    # ======================
    public function result_update(Request $request)
    {
        try {
            //トランザクション処理
            $response = DB::transaction(function () use ($request) {
                $validator = Validator::make($request->all(), [
                    'judge' => ['required', 'int'],
                    'battle_user_id' => ['required', 'int'],
                ]);
                if ($validator->fails()) {
                    return response()->json($validator->errors(), 400);
                }

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

                # 使用したカードを使用済みとする
                $deck = Deck::where('user_id', '=', $request->user()->id)->get();
                foreach ($deck as $item) { #取得したカード4枚分ループ
                    # リクエストされたユーザID指定で取得
                    $card = UsedCard::where('user_id', '=', $request->user()->id)
                        ->where('card_id', '=', $item->card_id)->get();

                    # 既に存在していた場合、スタックを加算
                    if (count($card) !== 0) {
                        $card[0]['stack'] += 1;
                        $card[0]->save();
                    } else { #ない場合、新規作成
                        UsedCard::create([
                            'user_id' => $request->user()->id,
                            'card_id' => $item->card_id,
                            'stack' => 1
                        ]);
                    }
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

    # ======================
    # デッキ更新処理
    # ======================
    public function deck_update(Request $request)
    {
        try {
            //トランザクション処理
            $response = DB::transaction(function () use ($request) {
                $validator = Validator::make($request->all(), [
                    'card1' => ['int'],
                    'card2' => ['int'],
                    'card3' => ['int'],
                    'card4' => ['int']
                ]);
                if ($validator->fails()) {
                    return response()->json($validator->errors(), 400);
                }

                # 該当ユーザのデッキを全て削除
                Deck::where('user_id', '=', $request->user()->id)->delete();

                if ($request->card1 !== null && $request->card1 !== 0) {
                    # DBに追加
                    Deck::create([
                        'user_id' => $request->user()->id,
                        'card_id' => $request->card1
                    ]);
                }
                if ($request->card2 !== null && $request->card2 !== 0) {
                    # DBに追加
                    Deck::create([
                        'user_id' => $request->user()->id,
                        'card_id' => $request->card2
                    ]);
                }
                if ($request->card3 !== null && $request->card3 !== 0) {
                    # DBに追加
                    Deck::create([
                        'user_id' => $request->user()->id,
                        'card_id' => $request->card3
                    ]);
                }
                if ($request->card4 !== null && $request->card4 !== 0) {
                    # DBに追加
                    Deck::create([
                        'user_id' => $request->user()->id,
                        'card_id' => $request->card4
                    ]);
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

    # ======================
    # 防衛デッキ更新処理
    # ======================
    public function defence_deck_update(Request $request)
    {
        try {
            //トランザクション処理
            $response = DB::transaction(function () use ($request) {
                $validator = Validator::make($request->all(), [
                    'card1' => ['int'],
                    'card2' => ['int'],
                    'card3' => ['int'],
                    'card4' => ['int']
                ]);
                if ($validator->fails()) {
                    return response()->json($validator->errors(), 400);
                }

                # 該当ユーザのデッキを全て削除
                DefenseDeck::where('user_id', '=', $request->user()->id)->delete();

                if ($request->card1 !== null && $request->card1 !== 0) {
                    # DBに追加
                    DefenseDeck::create([
                        'user_id' => $request->user()->id,
                        'card_id' => $request->card1
                    ]);
                }
                if ($request->card2 !== null && $request->card2 !== 0) {
                    # DBに追加
                    DefenseDeck::create([
                        'user_id' => $request->user()->id,
                        'card_id' => $request->card2
                    ]);
                }
                if ($request->card3 !== null && $request->card3 !== 0) {
                    # DBに追加
                    DefenseDeck::create([
                        'user_id' => $request->user()->id,
                        'card_id' => $request->card3
                    ]);
                }
                if ($request->card4 !== null && $request->card4 !== 0) {
                    # DBに追加
                    DefenseDeck::create([
                        'user_id' => $request->user()->id,
                        'card_id' => $request->card4
                    ]);
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

    # ======================
    # 使用済みカード消去処理
    # ======================
    public function usedCard_destroy(Request $request)
    {
        try {
            //トランザクション処理
            $response = DB::transaction(function () use ($request) {
                $validator = Validator::make($request->all(), [
                    'card_id' => ['required', 'int'],
                    'stack' => ['required', 'int'],
                ]);
                if ($validator->fails()) {
                    return response()->json($validator->errors(), 400);
                }

                # リクエストされたユーザID指定で取得
                $card = UsedCard::where('user_id', '=', $request->user()->id)
                    ->where('card_id', '=', $request->card_id)->get();

                if (count($card) !== 0) { #指定情報があった場合
                    # 取得スタックが0でないかつ指定スタックも0でない場合、取得スタックを減算
                    if ($request->stack > 0 && $card[0]['stack'] !== 0) {
                        $card[0]['stack'] -= $request->stack;
                        $card[0]->save();
                        # 減算結果が0を下回っていた場合、指定カラムを削除
                        if ($card[0]['stack'] <= 0) {
                            $card[0]->delete(); #指定カラムを削除
                        }
                    } else {
                        $card[0]->delete(); #指定カラムを削除
                    }
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
