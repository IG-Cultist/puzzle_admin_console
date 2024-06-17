<?php
use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PlayerItemController;
use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;

#ルート(ログイン画面)
Route::get('/',[LoginController::class,'index']);

#ログイン処理
Route::post('accounts/dologin',[LoginController::class,'dologin']);

#ログアウト処理
Route::post('accounts/dologout',[LoginController::class,'dologout']);

#ホーム画面
Route::get('accounts/home',[HomeController::class,'index']);

#アカウント一覧画面
Route::get('accounts/index/{account_id?}',[AccountController::class,'index']);

#プレイヤー一覧画面
Route::get('accounts/playerList',[PlayerController::class,'index']);

#アイテム一覧画面
Route::get('accounts/itemList',[ItemController::class,'index']);

#所持アイテム一覧画面
Route::get('accounts/playerItemList',[PlayerItemController::class,'index']);
