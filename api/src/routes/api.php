<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\BattleModeController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserItemController;
use App\Http\Controllers\UserMailController;
use App\Http\Middleware\NoCacheMiddleWare;
use Illuminate\Support\Facades\Route;

# ステージ一覧
Route::middleware(NoCacheMiddleWare::class)
    ->get('stages', [StageController::class, 'index'])
    ->name('stages');

# アイテム一覧
Route::middleware(NoCacheMiddleWare::class)
    ->get('items', [ItemController::class, 'index'])
    ->name('items');

# ユーザ更新 middlewareのsanctumでトークン認証
Route::middleware(NoCacheMiddleWare::class)
    ->post('users/update', [UserController::class, 'update'])
    ->middleware('auth:sanctum')->name('users/update');

# ユーザAPIグループ
Route::prefix('users')->name('users.')->controller(UserController::class)
    ->middleware(NoCacheMiddleWare::class)->group(function () {
        # ユーザ一覧
        Route::get('', 'index')->name('index');
        # ユーザ検索
        Route::get('{user_id}', 'show')->name('show');
        # ユーザ新規登録
        Route::post('store', 'store')->name('store');
    });

# バトルモードAPIグループ
Route::prefix('battleMode')->name('battleMode.')->controller(BattleModeController::class)
    ->middleware(NoCacheMiddleWare::class)->group(function () {
        # 使用可能カード一覧
        Route::get('usableCard', 'usableCard')->name('usableCard');
        # 防衛デッキ枚数検索処理
        Route::get('defenceDeckCount/show', 'defenceDeckCount_show')->name('defenceDeckCount/show');
        # バトルモードプロフィール一覧
        Route::get('', 'index')->name('index');
    });

# バトルモード更新グループ
Route::prefix('battleMode')->name('battleMode.')->controller(BattleModeController::class)
    ->middleware(NoCacheMiddleWare::class)->middleware('auth:sanctum')->group(function () {
        # バトルモードプロフィール追加
        Route::post('store', 'store')->name('store');
        # バトルモードプロフィール更新
        Route::post('update', 'update')->name('update');
        # リザルト更新
        Route::post('result/update', 'result_update')->name('result/update');
        # デッキ更新
        Route::post('deck/update', 'deck_update')->name('deck/update');
        # 防衛デッキ更新
        Route::post('defenceDeck/update', 'defence_deck_update')->name('defenceDeck/update');
        # 使用済みカード削除
        Route::post('usedCard/destroy', 'usedCard_destroy')->name('usedCard/destroy');
        # デッキ検索
        Route::get('deck/show', 'deck_show')->name('deck/show');
        # バトルモードプロフィール検索
        Route::get('show', 'show')->name('show');
        # リザルト検索
        Route::get('result/show', 'result_show')->name('result/show');
        # 使用済みカード検索
        Route::get('usedCard/show', 'usedCard_show')->name('usedCard/show');
        # 防衛デッキ検索
        Route::get('defenceDeck/show', 'defenceDeck_show')->name('defenceDeck/show');
        # ランダムなライバル3名取得処理
        Route::get('rivals/get', 'rivals_get')->name('rivals/get');
    });

# トークン生成
Route::middleware(NoCacheMiddleWare::class)
    ->post('createToken', [UserController::class, 'createToken']);

# ==============================
# 未使用API
# ==============================

# 所有アイテム更新
Route::middleware(NoCacheMiddleWare::class)
    ->post('userItems/update', [UserItemController::class, 'update'])
    ->name('userItems/update');

# フォロー登録
Route::middleware(NoCacheMiddleWare::class)
    ->post('follows/store', [FollowController::class, 'store'])
    ->name('follows/store');

# フォロー解除
Route::middleware(NoCacheMiddleWare::class)
    ->post('follows/destroy', [FollowController::class, 'destroy'])
    ->name('follows/destroy');

# メール更新
Route::middleware(NoCacheMiddleWare::class)
    ->post('mails/update', [MailController::class, 'update'])
    ->name('mails/update');

# ステージ更新
Route::middleware(NoCacheMiddleWare::class)
    ->post('stages/update', [StageController::class, 'update'])
    ->middleware('auth:sanctum')->name('stages/update');

# 所持実績更新
Route::middleware(NoCacheMiddleWare::class)
    ->post('userAchievement/update', [AchievementController::class, 'userAchievement_update'])
    ->name('userAchievement/update');

# ドロップアイテム一覧
Route::middleware(NoCacheMiddleWare::class)
    ->get('drops', [ItemController::class, 'drop'])
    ->name('drops');

# メールテンプレート一覧
Route::middleware(NoCacheMiddleWare::class)
    ->get('mails', [MailController::class, 'index'])
    ->name('mails');

# 使用可能アイテム一覧
Route::middleware(NoCacheMiddleWare::class)
    ->get('usables', [ItemController::class, 'usable'])
    ->name('usables');

# 実績一覧
Route::middleware(NoCacheMiddleWare::class)
    ->get('Achievements', [AchievementController::class, 'index'])
    ->name('Achievements');

# 所有アイテム検索
Route::middleware(NoCacheMiddleWare::class)
    ->get('userItems/{user_id}', [UserItemController::class, 'show'])
    ->name('userItems/show');


# 所有実績検索
Route::middleware(NoCacheMiddleWare::class)
    ->get('userAchievements/{user_id}', [AchievementController::class, 'userAchievement_show'])
    ->name('userAchievements/show');

# 受信メール検索
Route::middleware(NoCacheMiddleWare::class)
    ->get('userMails/{mail_id}', [UserMailController::class, 'show'])
    ->name('userMails/show');

# フォローリスト検索
Route::middleware(NoCacheMiddleWare::class)
    ->get('follows/{user_id}', [FollowController::class, 'show'])
    ->name('follows/show');
