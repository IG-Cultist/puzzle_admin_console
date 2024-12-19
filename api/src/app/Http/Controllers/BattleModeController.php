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
    public function index()
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
    # バトルモード複数プロフィール検索処理
    # ======================
    public function multiShow(Request $request)
    {
        $result = array();
        $cnt = 0;

        foreach ($request->user_ids as $userID) {
            $user = BattleMode::where('user_id', '=', $userID)->first();
            $result[$cnt] = $user;
            $cnt++;
        }
        return response()->json($result);
    }

    # ======================
    # デッキ検索処理
    # ======================
    public function deck_show(Request $request)
    {
        $deck = Deck::where('user_id', '=', $request->user()->id)->orderBy('id')->get();
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
        $deck = DefenseDeck::where('user_id', '=', $request->user()->id)->orderBy('id')->get();
        return response()->json(DefenseDeckResource::collection($deck));   #collectionで複数所得
    }


    # ======================
    # 防衛デッキ検索処理
    # ======================
    public function load(Request $request)
    {
        $deck = BattleMode::where('user_id', '=', $request->user()->id)->get();
        return response()->json(BattleModeResource::collection($deck));   #collectionで複数所得
    }

    # ======================
    # 戦闘可能ユーザ取得処理
    # ======================
    public function rivals_get(Request $request)
    {
        # サブクエリでユーザのカウントを取得
        $sub = DefenseDeck::select('user_id')
            ->selectRaw('COUNT(user_id) as count_userId')
            ->groupBy('user_id');

        # サブクエリで取得したカウントが4のもののみ取得する
        $result = DB::query()->select('user_id')
            ->fromSub($sub, 'sub')
            ->where('count_userId', '=', 4)->where('user_id', '!=', $request->user()->id)->get();

        # 取得したIDをシャッフル用変数に代入
        for ($i = 0; $i < count($result); $i++) {
            $numbers[$i] = $result[$i];
        }

        # 値をシャッフルする
        shuffle($numbers);

        $rivalDeck = array();
        $cnt = 0;
        for ($i = 0; $i < 3; $i++) {
            $num[$i] = $numbers[$i];
            $array1 = DefenseDeck::where('user_id', '=', $num[$i]->user_id)->get();
            foreach ($array1 as $item) {
                $rivalDeck[$cnt] = $item;
                $cnt++;
            }
        }
        return response()->json($rivalDeck);
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
                    $user = BattleMode::where('user_id', '=', $request->user()->id)->get();
                    $user[0]['point'] += 50;
                    $user[0]->save();

                    $user = BattleMode::where('user_id', '=', $request->battle_user_id)->get();
                    $user[0]['point'] -= 20;
                    if ($user[0]['point'] < 0) {
                        $user[0]['point'] = 0;
                    }
                    $user[0]->save();
                } elseif ($request->judge == 0) { #0の場合ユーザの敗北
                    Result::create([
                        'winner_id' => $request->battle_user_id,
                        'loser_id' => $request->user()->id
                    ]);
                    $user = BattleMode::where('user_id', '=', $request->battle_user_id)->get();
                    $user[0]['point'] += 50;
                    $user[0]->save();

                    $user = BattleMode::where('user_id', '=', $request->user()->id)->get();
                    $user[0]['point'] -= 20;
                    if ($user[0]['point'] < 0) {
                        $user[0]['point'] = 0;
                    }

                    $user[0]->save();
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

    # ======================
    # バトルモードプロフィール追加処理
    # ======================
    public function store(Request $request)
    {
        try {
            //トランザクション処理
            $response = DB::transaction(function () use ($request) {

                # リクエストされたユーザID指定で取得
                $user = BattleMode::where('user_id', '=', $request->user()->id)->get();

                if (count($user) == 0) { #指定情報なかった場合
                    # DBに追加
                    BattleMode::create([
                        'user_id' => $request->user()->id,
                        'name' => 'NoName',
                        'icon_name' => 'icon000',
                        'match_num' => 0,
                        'last_match_at' => '',
                        'point' => 0,
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
    # バトルモードプロフィール更新処理
    # ======================
    public function update(Request $request)
    {
        try {
            $response = DB::transaction(function () use ($request) {
                $validator = Validator::make($request->all(), [
                    'name' => ['string'],
                    'icon_name' => ['string'],
                ]);

                if ($validator->fails()) {
                    return response()->json($validator->errors(), 400);
                }
                # リクエストされたユーザID指定で取得
                $user = BattleMode::where('user_id', '=', $request->user()->id)->get();

                if (count($user) != 0) { #指定情報が存在していた場合
                    $user[0]['name'] = $request->name;
                    $user[0]['icon_name'] = $request->icon_name;
                    $user[0]->save();
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
