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

# ユーザ検索
Route::middleware(NoCacheMiddleWare::class)
    ->get('users/{user_id}', [UserController::class, 'show'])
    ->name('users/show');

# ユーザ一覧
Route::middleware(NoCacheMiddleWare::class)
    ->get('users', [UserController::class, 'index'])
    ->name('users');

# ステージ一覧
Route::middleware(NoCacheMiddleWare::class)
    ->get('stages', [StageController::class, 'index'])
    ->name('stages');

# メールテンプレート一覧
Route::middleware(NoCacheMiddleWare::class)
    ->get('mails', [MailController::class, 'index'])
    ->name('mails');

# アイテム一覧
Route::middleware(NoCacheMiddleWare::class)
    ->get('items', [ItemController::class, 'index'])
    ->name('items');

# ドロップアイテム一覧
Route::middleware(NoCacheMiddleWare::class)
    ->get('drops', [ItemController::class, 'drop'])
    ->name('drops');

# 使用可能アイテム一覧
Route::middleware(NoCacheMiddleWare::class)
    ->get('usables', [ItemController::class, 'usable'])
    ->name('usables');

# 使用可能カード一覧
Route::middleware(NoCacheMiddleWare::class)
    ->get('battleMode/usableCards', [BattleModeController::class, 'usableCard'])
    ->name('battleMode/usableCards');

# 実績一覧
Route::middleware(NoCacheMiddleWare::class)
    ->get('Achievements', [AchievementController::class, 'index'])
    ->name('Achievements');

# 所有アイテム検索
Route::middleware(NoCacheMiddleWare::class)
    ->get('userItems/{user_id}', [UserItemController::class, 'show'])
    ->name('userItems/show');

# バトルモード検索
Route::middleware(NoCacheMiddleWare::class)
    ->get('battleMode/{user_id}', [BattleModeController::class, 'show'])
    ->name('battleMode/show');

# デッキ検索
Route::middleware(NoCacheMiddleWare::class)
    ->get('battleMode/deck/{user_id}', [BattleModeController::class, 'deck_show'])
    ->name('battleMode/deck/show');

# 戦闘結果検索
Route::middleware(NoCacheMiddleWare::class)
    ->get('battleMode/result/{user_id}', [BattleModeController::class, 'result_show'])
    ->name('battleMode/result/show');

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

# ユーザ新規登録
Route::middleware(NoCacheMiddleWare::class)
    ->post('users/store', [UserController::class, 'store'])
    ->name('users/store');

# ユーザ更新
Route::middleware(NoCacheMiddleWare::class)
    ->post('users/update', [UserController::class, 'update'])
    ->name('users/update');

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
    ->name('stages/update');

# デッキ更新
Route::middleware(NoCacheMiddleWare::class)
    ->post('battleMode/deck/update', [BattleModeController::class, 'deck_update'])
    ->name('battleMode/deck/update');

# デッキ消去
Route::middleware(NoCacheMiddleWare::class)
    ->post('battleMode/deck/destroy', [BattleModeController::class, 'deck_destroy'])
    ->name('battleMode/deck/destroy');

# 所持実績更新
Route::middleware(NoCacheMiddleWare::class)
    ->post('userAchievement/update', [AchievementController::class, 'userAchievement_update'])
    ->name('userAchievement/update');

# デッキ更新
Route::middleware(NoCacheMiddleWare::class)
    ->post('battleMode/result/update', [BattleModeController::class, 'result_update'])
    ->name('battleMode/result/update');
