<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ReceiverController;
use App\Http\Controllers\UserItemController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\NoCacheMiddleWare;
use Illuminate\Support\Facades\Route;

# キャッシュ保存無効化
Route::middleware(NoCacheMiddleWare::class)->group(function () {

# アカウントコントローラーの処理をグループ化
    Route::prefix('accounts')->name('accounts.')->controller(AccountController::class)
        ->middleware(AuthMiddleware::class)->group(function () {
            Route::get('create', 'create')->name('create');          #新規作成画面
            Route::get('store', 'store')->name('store');             #作成完了画面
            Route::get('index', 'index')->name('index');             #一覧画面
            Route::get('{id}/update', 'update')->name('update');     #更新画面

            Route::post('{id}/destroy', 'destroy')->name('destroy'); #削除処理
            Route::post('{id}/edit', 'edit')->name('edit');          #編集処理
            Route::post('show', 'show')->name('show');               #検索処理
            Route::post('docreate', 'docreate')->name('docreate');   #新規作成処理
        });

# ルート(ログイン画面)
    Route::get('/', [LoginController::class, 'index'])->name('login');

# ホーム画面
    Route::get('accounts/home', [HomeController::class, 'index'])->name('accounts.home');

# プレイヤー一覧画面
    Route::get('accounts/userList', [UserController::class, 'index'])->name('accounts.user');

# アイテム一覧画面
    Route::get('accounts/itemList', [ItemController::class, 'index'])->name('accounts.item');

# 所持アイテム一覧画面
    Route::get('accounts/userItemList', [UserItemController::class, 'index'])->name('accounts.userItem');

# 所持アイテム一覧画面
    Route::get('accounts/receiver', [ReceiverController::class, 'index'])->name('accounts.receiver');

# メール送信フォーム
    Route::get('accounts/send', [MailController::class, 'index'])->name('accounts.send');


# ログイン処理
    Route::post('accounts/dologin', [LoginController::class, 'dologin'])->name('accounts.login');

# ログアウト処理
    Route::post('accounts/dologout', [LoginController::class, 'dologout'])->name('accounts.logout');

# 所持アイテム検索処理
    Route::post('accounts/{id}/showProp', [UserItemController::class, 'show'])->name('accounts.showProp');

# ログイン処理
    Route::post('accounts/sendMail', [MailController::class, 'sendMail'])->name('accounts.sendMail');
});
