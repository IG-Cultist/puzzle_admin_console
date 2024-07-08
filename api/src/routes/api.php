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

Route::middleware(NoCacheMiddleWare::class)
    ->get('users/{user_id}', [UserController::class, 'show'])
    ->name('users/show');

Route::middleware(NoCacheMiddleWare::class)
    ->get('users', [UserController::class, 'index'])
    ->name('users');

Route::middleware(NoCacheMiddleWare::class)
    ->get('mails', [MailController::class, 'index'])
    ->name('mails');

Route::middleware(NoCacheMiddleWare::class)
    ->get('items', [ItemController::class, 'index'])
    ->name('items');

Route::middleware(NoCacheMiddleWare::class)
    ->get('userItems/{user_id}', [UserItemController::class, 'show'])
    ->name('userItems/show');

Route::middleware(NoCacheMiddleWare::class)
    ->get('userMails/{user_id}', [UserMailController::class, 'show'])
    ->name('userMails/show');

Route::middleware(NoCacheMiddleWare::class)
    ->get('follows/{user_id}', [FollowController::class, 'show'])
    ->name('follows/show');
