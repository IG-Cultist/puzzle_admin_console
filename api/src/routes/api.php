<?php

use App\Http\Controllers\FollowController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserItemController;
use App\Http\Controllers\UserMailController;
use App\Http\Middleware\NoCacheMiddleWare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

# ユーザ検索
Route::middleware(NoCacheMiddleWare::class)
    ->get('users/{user_id}', [UserController::class, 'show'])
    ->name('users/show');

# ユーザ一覧
Route::middleware(NoCacheMiddleWare::class)
    ->get('users', [UserController::class, 'index'])
    ->name('users');

# メールテンプレート一覧
Route::middleware(NoCacheMiddleWare::class)
    ->get('mails', [MailController::class, 'index'])
    ->name('mails');

# アイテム一覧
Route::middleware(NoCacheMiddleWare::class)
    ->get('items', [ItemController::class, 'index'])
    ->name('items');

# 所有アイテム検索
Route::middleware(NoCacheMiddleWare::class)
    ->get('userItems/{user_id}', [UserItemController::class, 'show'])
    ->name('userItems/show');

# メール検索
Route::middleware(NoCacheMiddleWare::class)
    ->get('userMails/{user_id}', [UserMailController::class, 'show'])
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
